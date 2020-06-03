<?php
/**
 * @file		optimize.php 	Task to optimize database tables daily
 *~TERABYTE_DOC_READY~
 * $Copyright: (c) 2001 - 2011 Invision Power Services, Inc.$
 * $License: http://www.invisionpower.com/company/standards.php#license$
 * $Author: ips_terabyte $
 * @since		-
 * $LastChangedDate: 2011-02-08 17:20:18 -0500 (Tue, 08 Feb 2011) $
 * @version		v3.3.1
 * $Revision: 7750 $
 */

if ( ! defined( 'IN_IPB' ) )
{
	print "<h1>Incorrect access</h1>You cannot access this file directly. If you have recently upgraded, make sure you upgraded all the relevant files.";
	exit();
}

/**
 *
 * @class		task_item
 * @brief		Task to optimize database tables daily
 *
 */
class task_item
{
	/**
	 * Tables to optimize.  Initially I was just going to run
	 * optimize tables query against all tables, but Charles
	 * prefers this static list of tables, and so it shall be.
	 *
	 * @var		$charlesTables
	 */
	protected $charlesTables = array( 'core_item_markers',
									  'core_item_markers_storage',
									  'inline_notifications',
									  'cache_store',
									  'content_cache_posts',
									 );
	
	/**
	 * Object that stores the parent task manager class
	 *
	 * @var		$class
	 */
	protected $class;
	
	/**
	 * Array that stores the task data
	 *
	 * @var		$task
	 */
	protected $task = array();
	
	/**
	 * Registry Object Shortcuts
	 *
	 * @var		$registry
	 * @var		$DB
	 * @var		$lang
	 */
	protected $registry;
	protected $DB;
	protected $lang;
	
	/**
	 * Constructor
	 *
	 * @param	object		$registry		Registry object
	 * @param	object		$class			Task manager class object
	 * @param	array		$task			Array with the task data
	 * @return	@e void
	 */
	public function __construct( ipsRegistry $registry, $class, $task )
	{
		/* Make registry objects */
		$this->registry	= $registry;
		$this->DB		= $this->registry->DB();
		$this->lang		= $this->registry->getClass('class_localization');
		
		$this->class	= $class;
		$this->task		= $task;
	}
	
	/**
	 * Run this task
	 * 
	 * @return	@e void
	 */
	public function runTask()
	{
		/* Not needed for mssql as per #23105 bug */
		if ( ipsRegistry::dbFunctions()->getDriverType() != 'mysql' )
		{
			$this->class->unlockTask( $this->task );
			return;
		}
		
		/* Get tables and optimize */
		$_tables = $this->charlesTables;
		
		if( is_array($_tables) AND count($_tables) )
		{
			$PRE = ipsRegistry::dbFunctions()->getPrefix();
			ipsRegistry::dbFunctions()->prefix_changed = true;
			
			foreach( $_tables as $_table )
			{
				$this->DB->query( "OPTIMIZE TABLE {$PRE}{$_table}" );
				$this->DB->query( "ANALYZE TABLE {$PRE}{$_table}" );
			}
			
			ipsRegistry::dbFunctions()->prefix_changed = false;
		}
		
		/* Log to log table - modify but dont delete */
		$this->registry->getClass('class_localization')->loadLanguageFile( array( 'public_global' ), 'core' );
		$this->class->appendTaskLog( $this->task, sprintf( $this->lang->words['task__optimizedtables'], count($_tables) ) );
		
		/* Unlock Task: DO NOT MODIFY! */
		$this->class->unlockTask( $this->task );
	}
}