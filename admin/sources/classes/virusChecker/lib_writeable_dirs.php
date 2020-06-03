<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Virus scanner: writable directories
 * Last Updated: $Date: 2010-12-23 19:57:29 -0500 (Thu, 23 Dec 2010) $
 * </pre>
 *
 * @author 		$Author: bfarber $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		Tue. 17th August 2004
 * @version		$Rev: 7485 $
 *
 */


$WRITEABLE_DIRS = array(
'cache',
'cache/skin_cache',
'cache/lang_cache',
PUBLIC_DIRECTORY . '/style_emoticons',
PUBLIC_DIRECTORY . '/style_images',
PUBLIC_DIRECTORY . '/style_css',
'uploads'
);
