<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Setup CLI Script Overrider
 * Last Updated: $LastChangedDate: 2011-09-22 09:37:11 -0400 (Thu, 22 Sep 2011) $
 * </pre>
 *
 * @author 		$Author: mark $
 * @copyright	© 2011 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 9537 $
 *
 */

class CLIOutput extends output
{
	public $currentStep = 1;

	public function __construct( $steps, $controller )
	{
		$this->steps = $steps;
		$this->controller = $controller;
		
		parent::__construct( ipsRegistry::instance(), FALSE );
	}
	
	public function setNextAction( $next )
	{
		$next = str_replace( '&amp;', '&', $next );
		if ( substr( $next, 0, 8 ) == 'install&' )
		{
			$next = substr( $next, 8 );
		}

		$this->next = $next;
	}
	
	 public function sendOutput( $saveData=TRUE )
	{
		if ( $this->next != 'done' )
		{
			parse_str( $this->next, $vars );
			$_REQUEST = $vars;
			$this->controller->request = $vars;
			$this->controller->doExecute( ipsRegistry::instance() );
		}
	}

	public function template()
	{
		return new CLIOutputTemplate();
	}
}

class CLIOutputTemplate
{
	public function __call( $name, $arguments )
	{
		return '';
	}
}