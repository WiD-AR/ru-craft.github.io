<?php
/**
 * <pre>
 * Invision Power Services
 * IP.Board v3.3.1
 * Installer: ADMIN file
 * Last Updated: $LastChangedDate: 2011-05-05 07:03:47 -0400 (Thu, 05 May 2011) $
 * </pre>
 *
 * @author 		$Author: ips_terabyte $
 * @copyright	(c) 2001 - 2009 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/community/board/license.html
 * @package		IP.Board
 * @link		http://www.invisionpower.com
 * @version		$Rev: 8644 $
 *
 */


class install_admin extends ipsCommand
{	
	/**
	 * Execute selected method
	 *
	 * @access	public
	 * @param	object		Registry object
	 * @return	@e void
	 */
	public function doExecute( ipsRegistry $registry ) 
	{
		$_e = 0;
		
		/* Check input? */
		if( $this->request['do'] == 'check' )
		{
			if( ! $this->request['username'] )
			{
				$_e = 1;
				$this->registry->output->addWarning( 'Необходимо указать имя пользователя' );
			}
		
			if( ! $this->request['password'] )
			{
				$_e = 1;
				$this->registry->output->addWarning( 'Необходимо ввести пароль' );
			}
			else 
			{
				if( $this->request['password'] != $this->request['confirm_password']	)
				{
					$_e = 1;
					$this->registry->output->addWarning( 'Введенные пароли не совпадают' );
				}
			}
			
			if( ! $this->request['email'] OR IPSText::checkEmailAddress( $this->request['email'] ) !== TRUE )
			{
				$_e = 1;
				$this->registry->output->addWarning( 'Необходимо указать Email' );
			}
			
			if ( $_e )
			{
				$this->registry->output->setTitle( "Администратор: Ошибка" );
				$this->registry->output->setNextAction( 'admin&do=check' );
				$this->registry->output->addContent( $this->registry->output->template()->page_admin() );
				$this->registry->output->sendOutput();	
			}
			else 
			{
				/* Save Form Data */
				IPSSetUp::setSavedData('admin_user',       $this->request['username'] );
				IPSSetUp::setSavedData('admin_pass',       $this->request['password'] );
				IPSSetUp::setSavedData('admin_email',      $this->request['email'] );

				/* Next Action */
				$this->registry->autoLoadNextAction( 'install' );
				return;				
			}		
		}

		/* Output */
		$this->registry->output->setTitle( "Создание учетной записи администратора" );
		$this->registry->output->setNextAction( 'admin&do=check' );
		$this->registry->output->addContent( $this->registry->output->template()->page_admin() );
		$this->registry->output->sendOutput();
	}
}