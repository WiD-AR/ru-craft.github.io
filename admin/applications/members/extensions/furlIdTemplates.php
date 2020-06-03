<?php
/**
 * Invision Power Services
 * IP.Board v3.0.1
 * Sets up SEO templates
 * Last Updated: $Date: 2009-03-04 15:08:31 +0000 (Wed, 04 Mar 2009) $
 *
 * @author 		$Author: bfarber $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		Invision Power Board
 * @subpackage	Members
 * @link		http://www.invisionpower.com
 * @since		20th February 2002
 * @version		$Rev: 4136 $
 *
 */

/**
 * SEO templates
 *
 * 'allowRedirect' is a flag to tell IP.Board whether to check the incoming link and if not formatted correctly, redirect the correct one
 *
 * OUT FORMAT REGEX:
 * First array element is a regex to run to see if we've a match for the URL
 * The second array element is the template to use the results of the parenthesis capture
 *
 * Special variable #{__title__} is replaced with the $title data passed to output->formatUrl( $url, $title)
 *
 * IMPORTANT: Remember that when these regex are used, the output has not been fully parsed so you will get:
 * showuser={$data['member_id']} NOT showuser=1 so do not try and match numerics only!
 *
 * IN FORMAT REGEX
 *
 * This allows the registry to piece back together a URL based on the template regex
 * So, for example: "/user/(\d+?)/", 'matches' => array(  array( 'showuser' => '$1' ) )tells IP.Board to populate 'showuser' with the result
 * of the parenthesis capture #1
 */
$_SEOTEMPLATES = array(
	
	'showuser'		=> array( 'app'		      => 'members',
							  'allowRedirect' => 1,
							  'out'           => array( '#showuser=(.+?)(&|$)#i', 'user/$1/$2' ),
							  'in'            => array( 'regex'   => "#/user/(\d+)/?#i",
													    'matches' => array( array( 'showuser', '$1' ) ) ) ),

	'members_status_friends'=> array( 'app'		      => 'members',
									  'allowRedirect' => 0,
									  'out'           => array( '#app=members(?:&|&amp;)module=profile(?:&|&amp;)section=status(?:&|&amp;)type=friends(&|$)#i', 'statuses/friends/$2' ),
									  'in'            => array( 'regex'   => "#/statuses/friends#i",
															    'matches' => array( array( 'app'    , 'members' ),
															    					array( 'section', 'status' ),
															    					array( 'module' , 'profile' ),
															    					array( 'type'   , 'friends' ) ) ) ),

	'members_status_all'	=> array( 'app'		      => 'members',
									  'allowRedirect' => 0,
									  'out'           => array( '#app=members(?:&|&amp;)module=profile(?:&|&amp;)section=status((?:&|&amp;)type=all)?(&|$)#i', 'statuses/all/$2' ),
									  'in'            => array( 'regex'   => "#/statuses/all#i",
															    'matches' => array( array( 'app'    , 'members' ),
															    					array( 'section', 'status' ),
															    					array( 'module' , 'profile'  ) ) ) ),

	'members_list'  => array( 
						'app'			=> 'members',
						'allowRedirect' => 0,
						'out'			=> array( '#app=members((&|&amp;)module=list)?#i', 'members/' ),
						'in'			=> array( 
													'regex'		=> "#/members(/|$|\?)#i",
													'matches'	=> array( array( 'app', 'members' ),
																		  array( 'module', 'list' )  )
												) 
									),
);
