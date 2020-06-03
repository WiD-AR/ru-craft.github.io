<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Some required extensions to check for
 * Last Updated: $Date: 2010-12-17 08:03:58 -0500 (Fri, 17 Dec 2010) $
 * </pre>
 *
 * @author 		Matt Mecham
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		1st December 2008
 * @version		$Revision: 7446 $
 *
 */
 
$INSTALLDATA = array(
	
array( 'prettyname'		=> "Поддержка DOM XML",
	   'extensionname'	=> "libxml2",
	   'helpurl'		=> "http://www.php.net/manual/en/dom.setup.php",
	   'testfor'		=> 'dom',
	   'nohault'		=> false ),

array( 'prettyname'		=> "Библиотека GD",
	   'extensionname'	=> "gd",
	   'helpurl'		=> "http://www.php.net/manual/en/image.setup.php",
	   'testfor'		=> 'gd',
	   'nohault'		=> true ),
	
	
array( 'prettyname'		=> "Класс Reflection",
	   'extensionname'	=> "Reflection",
	   'helpurl'		=> "http://www.php.net/manual/en/language.oop5.reflection.php",
	   'testfor'		=> 'Reflection',
	   'nohault'		=> false ),

array( 'prettyname'		=> "SPL",
	   'extensionname'	=> "SPL",
	   'helpurl'		=> "http://www.php.net/manual/en/book.spl.php",
	   'testfor'		=> 'SPL',
	   'nohault'		=> true ),
	   
array( 'prettyname'		=> "OpenSSL",
	   'extensionname'	=> "openssl",
	   'helpurl'		=> "http://www.php.net/manual/en/book.openssl.php",
	   'testfor'		=> 'openssl',
	   'nohault'		=> true ),
	   
array( 'prettyname'		=> "JSON",
	   'extensionname'	=> "json",
	   'helpurl'		=> "http://www.php.net/manual/en/book.json.php",
	   'testfor'		=> 'json',
	   'nohault'		=> true ),
);