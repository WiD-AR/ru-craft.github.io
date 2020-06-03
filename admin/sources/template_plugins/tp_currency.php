<?php

/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Template Pluging: Currency
 * Last Updated: $Date: 2011-05-05 07:03:47 -0400 (Thu, 05 May 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 8644 $
 */

/**
* Main loader class
*/
class tp_currency extends output implements interfaceTemplatePlugins
{
	/**
	 * Prevent our main destructor being called by this class
	 *
	 * @access	public
	 * @return	@e void
	 */
	public function __destruct()
	{
	}
	
	/**
	 * Run the plug-in
	 *
	 * @access	public
	 * @param	string	The initial data from the tag
	 * @param	array	Array of options
	 * @return	string	Processed HTML
	 */
	public function runPlugin( $data, $options )
	{
		$return = '$this->registry->getClass(\'class_localization\')->formatMoney( ' . $data . ', FALSE )';
		
		return '" . ' . $return . ' . "';
	}
	
	/**
	 * Return information about this modifier.
	 *
	 * It MUST contain an array  of available options in 'options'. If there are no allowed options, then use an empty array.
	 * Failure to keep this up to date will most likely break your template tag.
	 *
	 * @access	public
	 * @return	array
	 */
	public function getPluginInfo()
	{
		return array( 'name'    => 'currency',
					  'author'  => 'IPS, Inc.',
					  'usage'   => '{parse currency="5.00"}',
					  'options' => array( 'format', 'relative' ) );
	}
}