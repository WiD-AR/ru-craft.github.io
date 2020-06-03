<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Member AJAX DST switcher
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
 *
 */

if ( ! defined( 'IN_IPB' ) )
{
	print "<h1>Incorrect access</h1>You cannot access this file directly. If you have recently upgraded, make sure you upgraded all the relevant files.";
	exit();
}

class public_members_ajax_dst extends ipsAjaxCommand 
{
	/**
	 * Class entry point
	 *
	 * @param	object		Registry reference
	 * @return	@e void		[Outputs to screen]
	 */
	public function doExecute( ipsRegistry $registry ) 
	{
		if( !$this->memberData['member_id'] )
		{
			$this->returnNull();
		}
		
		if( $this->memberData['members_auto_dst'] == 1 AND $this->settings['time_dst_auto_correction'] )
		{
			$newValue	= $this->memberData['dst_in_use'] ? 0 : 1;
			
			IPSMember::save( $this->memberData['member_id'], array( 'members' => array( 'dst_in_use' => $newValue ) ) );
		}

		$this->returnNull();
	}
}