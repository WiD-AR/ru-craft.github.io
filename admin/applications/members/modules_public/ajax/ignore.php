<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Profile AJAX Ignore User
 * Last Updated: $Date: 2011-05-05 07:03:47 -0400 (Thu, 05 May 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @subpackage	Members
 * @link		http://www.invisionpower.com
 * @since		Tuesday 1st March 2005 (11:52)
 * @version		$Revision: 8644 $
 */

if ( ! defined( 'IN_IPB' ) )
{
	print "<h1>Incorrect access</h1>You cannot access this file directly. If you have recently upgraded, make sure you upgraded all the relevant files.";
	exit();
}

class public_members_ajax_ignore extends ipsAjaxCommand 
{
	/**
	 * Class entry point
	 *
	 * @param	object		Registry reference
	 * @return	@e void		[Outputs to screen]
	 */
	public function doExecute( ipsRegistry $registry ) 
	{
		/* Get ignore user quick call file */
		$classToLoad = IPSLib::loadActionOverloader( IPSLib::getAppDir( 'members' ) . '/modules_public/profile/ignore.php', 'public_members_profile_ignore' );
		$library     = new $classToLoad( $registry );
		$library->makeRegistryShortcuts( $registry );

		switch( $this->request['do'] )
		{
			default:
			case 'add':
				$result	= $library->ignoreMember( $this->request['memberID'], 'topics' );
			break;
			
			case 'remove':
				$result	= $library->stopIgnoringMember( $this->request['memberID'], 'topics' );
			break;
			
			case 'addPM':
				$result	= $library->ignoreMember( $this->request['memberID'], 'messages' );
			break;
			
			case 'removePM':
				$result	= $library->stopIgnoringMember( $this->request['memberID'], 'messages' );
			break;
		}
		
		$this->returnJsonArray( $result );
	}
}