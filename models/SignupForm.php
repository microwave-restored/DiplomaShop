<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\helper\Html;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required', 'message' => 'Необходимо заполнить поле'],
            ['username', 'unique', 'targetClass'=> User::className(), 'message' => 'Данный логин занят'],
            ['email', 'unique', 'targetClass'=> User::className(), 'message' => 'Данный email занят']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль.');
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
