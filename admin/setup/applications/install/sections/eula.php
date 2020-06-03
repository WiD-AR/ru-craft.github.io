<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Installer: EULA file
 * Last Updated: $LastChangedDate: 2011-12-30 11:20:59 -0500 (Fri, 30 Dec 2011) $
 * </pre>
 *
 * @author 		$Author: mark $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 10077 $
 *
 */


class install_eula extends ipsCommand
{	
	/**
	 * Execute selected method
	 *
	 * @access	public
	 * @param	object		Registry object
	 * @return	@e void
	 */
	public function doExecute( ipsRegistry $registry ) 
	{		
		/* Simply return the EULA page */
		$this->registry->output->setTitle( "Соглашение" );
		$this->registry->output->addContent( $this->registry->output->template()->page_eula() );
		$this->registry->output->sendOutput();
	}
}