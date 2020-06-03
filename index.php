<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Main public executable wrapper.
 * Set-up and load module to run
 * Last Updated: $Date: 2011-03-11 12:41:48 -0500 (Fri, 11 Mar 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 8042 $
 *
 */	

define( 'IPB_THIS_SCRIPT', 'public' );
require_once( './initdata.php' );/*noLibHook*/

require_once( IPS_ROOT_PATH . 'sources/base/ipsRegistry.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'sources/base/ipsController.php' );/*noLibHook*/

ipsController::run();

exit();