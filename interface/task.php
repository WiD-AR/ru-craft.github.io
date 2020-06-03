#!/usr/bin/php -q
<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Task Handler
 * Last Updated: $Date: 2012-04-05 12:35:31 -0400 (Thu, 05 Apr 2012) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	© 2011 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @subpackage	Core
 * @link		http://www.invisionpower.com
 * @version		$Revision: 10571 $
 */

//ini_set( 'display_errors', 'off' );

define( 'IPS_ENFORCE_ACCESS', TRUE );
require_once( str_replace( '/interface/task.php', '/initdata.php', $_SERVER['argv'][0] ) );/*noLibHook*/

require_once( IPS_ROOT_PATH . 'sources/base/ipsRegistry.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'sources/base/ipsController.php' );/*noLibHook*/
	
$registry = ipsRegistry::instance();
$registry->init();

if ( isset( $_SERVER['argv'][1] ) )
{
	ipsRegistry::$request['ck'] = $_SERVER['argv'][1];
}
else
{
	die;	
}

if ( isset( $_SERVER['argv'][2] ) )
{
	ipsRegistry::$request['allpass'] = $_SERVER['argv'][2];
}


$classToLoad = IPSLib::loadLibrary( IPS_ROOT_PATH . 'sources/classes/class_taskmanager.php', 'class_taskmanager' );
$functions = new $classToLoad( $registry );

$functions->runTask();