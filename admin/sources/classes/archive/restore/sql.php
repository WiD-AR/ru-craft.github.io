<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Archive: Restore
 * By Matt Mecham
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2010 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		17th February 2010
 * @version		$Revision: 8644 $
 */

class classes_archive_restore_sql extends classes_archive_restore
{
	
	public function __construct()
	{
		/* Make registry objects */
		$this->registry		=  ipsRegistry::instance();
		$this->DB			=  $this->registry->DB();
		$this->settings		=& $this->registry->fetchSettings();
		$this->request		=& $this->registry->fetchRequest();
		$this->lang			=  $this->registry->getClass('class_localization');
		$this->member		=  $this->registry->member();
		$this->memberData	=& $this->registry->member()->fetchMemberData();
		$this->cache		=  $this->registry->cache();
		$this->caches		=& $this->registry->cache()->fetchCaches();
	}
	
	/**
	 * Write single entry to DB
	 * @param	array	INTS
	 */
	public function set( $data=array() )
	{
		if ( ! count( $data ) )
		{
			return null;
		}
		
		$this->DB->replace( 'posts', $this->archiveToNativeFields( $data ), array( 'pid' ) );
	}
	
}
