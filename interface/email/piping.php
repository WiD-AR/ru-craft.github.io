#!/usr/bin/php -q
<?php
/**
 * Invision Power Services
 * Incoming Email Handler - Piping
 * Last Updated: $Date: 2011-08-23 10:24:47 -0400 (Tue, 23 Aug 2011) $
 *
 * @author 		$Author: mark $
 * @copyright	(c) 2010 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		12th February 2010
 * @version		$Revision: 9404 $
 */
 
 	$writeDebug	= FALSE;
 	$readDebug	= FALSE;
 
 	//--------------------------------------
 	// Init
 	//--------------------------------------
 	 	 	  	
	$root = isset( $_SERVER['argv'][0] ) ? $_SERVER['argv'][0] : $_SERVER['SCRIPT_FILENAME'];
	define( '_DOC_IPS_ROOT_PATH', str_replace( 'interface/email/piping.php', '', $root ) );
	
	$INFO = array();
	require_once( _DOC_IPS_ROOT_PATH . 'conf_global.php' );/*noLibHook*/
	define( 'BASE_URL', $INFO['board_url'] );
	
	require_once( _DOC_IPS_ROOT_PATH . 'initdata.php' );/*noLibHook*/
	define( 'IPS_ROOT_PATH', DOC_IPS_ROOT_PATH . CP_DIRECTORY . '/' );
	define( 'IPS_KERNEL_PATH', DOC_IPS_ROOT_PATH . "ips_kernel/" );
	
	$debugPath = DOC_IPS_ROOT_PATH . 'cache/_email.txt';
	
	//-----------------------------------------
	// Get the Email
	//-----------------------------------------
	
	$email = file_get_contents( $readDebug ? $debugPath : 'php://stdin' );
	
	if ( $writeDebug )
	{
		file_put_contents( $debugPath, $email );
	}
		
	require_once ( IPS_KERNEL_PATH . 'classIncomingEmail.php' );/*noLibHook*/
	$incomingEmail = new classIncomingEmail( $email );
	if ( !$incomingEmail->ignore )
	{
		@$incomingEmail->route();
	}
	
	exit();