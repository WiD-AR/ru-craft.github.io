<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Update captcha image
 * Last Updated: $Date: 2011-05-05 07:03:47 -0400 (Thu, 05 May 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @subpackage	Core
 * @link		http://www.invisionpower.com
 * @since		2.3
 * @version		$Revision: 8644 $
 *
 */

if ( ! defined( 'IN_IPB' ) )
{
	print "<h1>Incorrect access</h1>You cannot access this file directly. If you have recently upgraded, make sure you upgraded all the relevant files.";
	exit();
}

class public_core_ajax_captcha extends ipsAjaxCommand 
{
	/**
	 * Main class entry point
	 *
	 * @param	object		ipsRegistry reference
	 * @return	@e void		[Outputs to screen]
	 */
	public function doExecute( ipsRegistry $registry )
	{
    	switch( ipsRegistry::$request['do'] )
    	{
			default:
			case 'refresh':
    			$this->refresh();
    		break;
    		
    	}
	}
	
	/**
	 * Refresh the captcha image
	 *
	 * @return	@e void		[Outputs to screen]
	 */
	public function refresh()
	{
		$captcha_unique_id = trim( IPSText::alphanumericalClean( ipsRegistry::$request['captcha_unique_id'] ) );
		
		$template    = $this->registry->getClass('class_captcha')->getTemplate( $captcha_unique_id );
		$newUniqueID = $this->registry->getClass('class_captcha')->captchaKey;

		$this->returnString( $newUniqueID );
	}

}