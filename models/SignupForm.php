<?php

namespace app\models; //app\models;

use yii\base\Model;

class SignupForm extends Model{
 
public $username;
public $password;
public $email;
public $fio;
 
 public function rules() {
 return [
 [['username', 'password','email','fio'], 'required', 'message' => 'Заполните поле'],
 ];
 }
 
 public function attributeLabels() {
 return [
 'fio' => 'Имя',
 'username' => 'Логин',
 'password' => 'Пароль',
 'email' => 'E-mail',
 ];
 }
 
}
