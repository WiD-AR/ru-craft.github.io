<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Installer: EULA file
 * Last Updated: $LastChangedDate: 2011-05-05 07:03:47 -0400 (Thu, 05 May 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 8644 $
 *
 */


class install_done extends ipsCommand
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
		$installLocked = FALSE;
		
		/* Lock the page */
		if ( @file_put_contents( DOC_IPS_ROOT_PATH . 'cache/installer_lock.php', 'Just out of interest, what did you expect to see here?' ) )
		{
			$installLocked = TRUE;
		}
		
		/* Clean conf global */
		IPSInstall::cleanConfGlobal();
		
		/* Simply return the EULA page */
		$this->registry->output->setTitle( "Установка завершена!" );
		$this->registry->output->setHideButton( TRUE );
		$this->registry->output->addContent( $this->registry->output->template()->page_installComplete( $installLocked ) );
		$this->registry->output->sendOutput( FALSE );
	}
}