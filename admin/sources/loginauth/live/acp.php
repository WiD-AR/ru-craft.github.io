<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Login handler abstraction : Windows Live method
 * Last Updated: $Date: 2012-03-05 16:36:15 -0500 (Mon, 05 Mar 2012) $
 * </pre>
 *
 * @author 		$Author: bfarber $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		Tuesday 1st March 2005 (11:52)
 * @version		$Revision: 10391 $
 *
 */

$config		= array(
					array(
							'title'			=> 'Location of key XML',
							'description'	=> "You must register your site as an application and receive an application ID to utilize Windows Live(tm) on your site.  See the <a href='http://msdn.microsoft.com/en-us/library/bb676626.aspx'>MSDN Library</a> for more information.  Note that it is recommended you store this file outside of your web root directory for security purposes.  See /admin/sources/loginauth/live/README.txt for more information.",
							'key'			=> 'key_file_location',
							'type'			=> 'string'
						),
					);