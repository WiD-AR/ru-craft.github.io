<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Remote API integration gateway file
 * Last Updated: $Date: 2012-01-10 05:32:57 -0500 (Tue, 10 Jan 2012) $
 * </pre>
 *
 * @author 		$Author: mark $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 10102 $
 *
 * @todo		http://community.invisionpower.com/tracker/issue-20920-liveid-logout/
 *
 */

/**
* Script type
*
*/
define( 'IPB_THIS_SCRIPT', 'api' );
define( 'IPB_LOAD_SQL'   , 'queries' );
define( 'IPS_PUBLIC_SCRIPT', 'index.php' );

require_once( '../../initdata.php' );/*noLibHook*/

//-----------------------------------------
// Main code
//-----------------------------------------

require_once( IPS_ROOT_PATH . 'sources/base/ipsRegistry.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'sources/base/ipsController.php' );/*noLibHook*/

$_GET['app']		= 'core';
$_REQUEST['app']	= 'core';
$_GET['module']		= 'global';
$_GET['section']	= 'login';
$_GET['do']			= 'process';

//-----------------------------------------
// Ignore auth key for live requests
//-----------------------------------------

define( 'IGNORE_AUTH_KEY', true );

ipsController::run();

exit();