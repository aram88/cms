<?php

class m110826_225349_add_initial_admin_user extends CDbMigration
{
	public function up()
	{
		if(app()->authManager===null)
		{
		    echo $this->authErrorMsg();
			return false;
		}
		
		$user = new User();
		$user->username = 'admin';
		$user->password = 'admin';
		$user->email = 'aramgrig@hotmail.com';
		if($user->save())
		{
			//assign this user to the admin role in rbac 
			app()->authManager->assign('ADMIN', $user->id);
		}
	}

	public function down()
	{
		if(app()->authManager===null)
		{
		    echo $this->authErrorMsg();;
			return false;
		}
		
		$user=User::model()->find('LOWER(username)=?',array('admin'));
		if(null!==$user)
		{
			app()->authManager->revoke('ADMIN', $user->id);
			$user->delete();
		}
	}
	
	private function authErrorMsg()
	{
		return "Error: an authorization manager, named 'authManager' is expected and must be configured in console/config/main.php to use this command.\n";
	}
}