<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Config for about me tab
 * Last Updated: $Date: 2012-01-05 09:23:52 -0500 (Thu, 05 Jan 2012) $
 * </pre>
 *
 * @author 		$Author: mark $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @subpackage	Members
 * @link		http://www.invisionpower.com
 * @since		20th February 2002
 * @version		$Rev: 10090 $
 *
 */

if ( ! defined( 'IN_IPB' ) )
{
	print "<h1>Incorrect access</h1>You cannot access this file directly. If you have recently upgraded, make sure you upgraded all the relevant files.";
	exit();
}

/**
* Plug in name (Default tab name)
*/
$CONFIG['plugin_name']        = 'Friends';

/**
* Language string for the tab
*/
$CONFIG['plugin_lang_bit']    = 'pp_tab_friends';

/**
* Plug in key (must be the same as the main {file}.php name
*/
$CONFIG['plugin_key']         = 'friends';

/**
* Show tab?
*/
$CONFIG['plugin_enabled']     = 1;

/**
* Order
*/
$CONFIG['plugin_order'] = 3;
