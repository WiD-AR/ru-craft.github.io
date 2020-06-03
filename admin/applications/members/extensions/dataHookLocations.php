<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Define data hook locations (Members)
 * Last Updated: $Date: 2011-11-02 18:06:05 -0400 (Wed, 02 Nov 2011) $
 * </pre>
 *
 * @author 		$Author: bfarber $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @subpackage	Core
 * @link		http://www.invisionpower.com
 * @version		$Rev: 9744 $
 */

$dataHookLocations = array(

	/* MESSENGER DATA LOCATIONS */
	array( 'messengerSendReplyData', 'Messenger: Reply data'),
	array( 'messengerSendTopicData', 'Messenger: New conversation, topic data' ),
	array( 'messengerSendTopicFirstPostData', 'Messenger: New conversation, first post' ),
	
	/* PROFILE DATA LOCATIONS */
	array( 'statusUpdateNew', 'New Status Update' ),
	array( 'statusCommentNew', 'New Status Comment' ),
	array( 'profileFriendsNew', 'Profile: New friend' ),
	
);