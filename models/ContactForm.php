<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ContactForm extends Model
{

    public $name, $email, $subject, $body, $verifyCode;
    
    public function rules()
    {
        return [
            [ ['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Подтвердите код',
            'name' => 'Имя',
            'email' => 'Электронный адрес',
            'subject' => 'Тема',
            'body' => 'Сообщение',
        ];
    }

    public function contact($emailto)
    {
        if ($this->validate()) {    
            Yii::$app->mailer->compose() 
                ->setFrom([\Yii::$app->params['senderEmail'] => $this->name]) 
                ->setTo($emailto) 
                ->setSubject($this->subject) 
                ->setTextBody($this->body) 
                ->send(); 

            return true;
        } else {
            return false;
        }
    }
}