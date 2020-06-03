<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Upgrade gateway
 * Last Updated: $LastChangedDate: 2011-03-11 12:41:48 -0500 (Fri, 11 Mar 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		14th May 2003
 * @version		$Rev: 8042 $
 */

define( 'IPB_THIS_SCRIPT', 'admin' );
define( 'IPS_IS_UPGRADER', TRUE );
define( 'IPS_IS_INSTALLER', FALSE );

require_once( '../../initdata.php' );/*noLibHook*/

require_once( IPS_ROOT_PATH . 'setup/sources/base/ipsRegistry_setup.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'setup/sources/base/ipsController_setup.php' );/*noLibHook*/

ipsController::run();

exit();
