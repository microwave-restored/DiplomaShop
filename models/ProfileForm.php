<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ProfileForm extends Model
{

    public $name, $email, $password, $prot;
    
    public function rules()
    {
        return [
            [['name', 'email', 'password'], string],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Электронный адрес',
            'prot' => 'Пароль',
            'prot' => 'Количество протеина',
        ];
    }

}