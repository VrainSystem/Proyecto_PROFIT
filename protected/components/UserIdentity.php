<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
yii::import('application.modules.Configuracion.models.Usuario');
class UserIdentity extends CUserIdentity
{
    
    private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 public function authenticate() {
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
        $user = Usuario::model()->find('LOWER(login)=?', array(strtolower($this->username)));
        if (!isset($user->login))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $user->id_usuario;
            
        }


        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
