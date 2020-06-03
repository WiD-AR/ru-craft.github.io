<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Subscriptions Hooks Gateway "Handler"
 * Owner: Matt "Oh Lord, why did I get assigned this?" Mecham
 * Last Updated: $Date: 2011-05-05 07:03:47 -0400 (Thu, 05 May 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @since		9th March 2005 11:03
 * @version		$Revision: 8644 $
 */
class members_hookGateway
{
	/**
	 * Registry Object Shortcuts
	 *
	 * @var		$registry
	 * @var		$DB
	 * @var		$settings
	 * @var		$request
	 * @var		$lang
	 * @var		$member
	 * @var		$memberData
	 * @var		$cache
	 * @var		$caches
	 */
	protected $registry;
	protected $DB;
	protected $settings;
	protected $request;
	protected $lang;
	protected $member;
	protected $memberData;
	protected $cache;
	protected $caches;
	
	/**
	 * Method constructor
	 *
	 * @param	object		Registry Object
	 * @return	@e void
	 */
	function __construct( ipsRegistry $registry )
	{
	    /* Make registry objects */
		$this->registry		=  $registry;
		$this->DB			=  $this->registry->DB();
		$this->settings		=& $this->registry->fetchSettings();
		$this->request		=& $this->registry->fetchRequest();
		$this->lang			=  $this->registry->getClass('class_localization');
		$this->member		=  $this->registry->member();
		$this->memberData	=& $this->registry->member()->fetchMemberData();
		$this->cache		=  $this->registry->cache();
		$this->caches		=& $this->registry->cache()->fetchCaches();
		
	}
    

    /**
     * Shows board index recent entries
     *
     */
    public function statusUpdates()
    {
    	/* System enabled? */
    	if ( ! $this->settings['su_enabled'] )
    	{
    		return '';
    	}
    	
    	$this->registry->class_localization->loadLanguageFile( array( 'public_profile' ), 'members' );
    	
		/* Load status class */
		if ( ! $this->registry->isClassLoaded( 'memberStatus' ) )
		{
			$classToLoad = IPSLib::loadLibrary( IPS_ROOT_PATH . 'sources/classes/member/status.php', 'memberStatus' );
			$this->registry->setClass( 'memberStatus', new $classToLoad( ipsRegistry::instance() ) );
		}
		
		/* Fetch */
		$statuses = $this->registry->getClass('memberStatus')->fetch( $this->memberData, array( 'limit' => intval( $this->settings['status_sidebar_show_x'] ), 'status_is_latest' => 1, 'ownerOnly' => true ) );
		
		return $this->registry->getClass('output')->getTemplate('boards')->hookBoardIndexStatusUpdates( $statuses );
    }
 }
 