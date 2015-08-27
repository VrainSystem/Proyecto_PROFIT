<?php

Yii::import('application.modules.Configuracion.models._base.BaseUsuario');

class Usuario extends BaseUsuario {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function validatePassword($password) {
        return md5($password) === $this->password;
    }

    protected function beforeSave() {
//        if($this->isNewRecord){
        $this->password = md5($this->password);
//        }
        return true;
    }

}
