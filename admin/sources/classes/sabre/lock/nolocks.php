<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Sabre classes by Matt Mecham
 * Last Updated: $Date: 2011-03-31 06:17:44 -0400 (Thu, 31 Mar 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		Friday 18th March 2011
 * @version		$Revision: 8229 $
 */
 
class sabre_lock_nolocks extends Sabre_DAV_Locks_Backend_Abstract
{
	public function getLocks( $uri )
	{
		return array();
	}

	public function lock( $uri, Sabre_DAV_Locks_LockInfo $lockInfo )
	{
		return true;
	}

	public function unlock( $uri, Sabre_DAV_Locks_LockInfo $lockInfo )
	{
		return true;
	}
}