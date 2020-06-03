<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Admin control panel gateway index.php file
 * Last Updated: $Date: 2012-04-04 11:41:16 -0400 (Wed, 04 Apr 2012) $
 * </pre>
 *
 * @author 		$Author: mark $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 10556 $
 *
 */

define( 'IPB_THIS_SCRIPT', 'admin' );
require_once( '../initdata.php' );/*noLibHook*/

if ( !isset( $_REQUEST['adsess'] ) )
{
	$uri = preg_replace( '#/index.php(\?.+)?#', '', $_SERVER['REQUEST_URI'] );
	$uri = trim( $uri, '/' );
	$bits = explode( '/', $uri );
	$adminDir = array_pop( $bits );
	if ( $adminDir != CP_DIRECTORY )
	{
		header( 'Location: ' . str_replace( $adminDir, CP_DIRECTORY, $uri ) );
		exit;
	}
}

require_once( IPS_ROOT_PATH . 'sources/base/ipsRegistry.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'sources/base/ipsController.php' );/*noLibHook*/

ipsController::run();

exit();