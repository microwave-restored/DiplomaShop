<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;


class Users extends \yii\db\ActiveRecord
{

    const ROLE_ADMIN = 'admin';
    const ROLE_MODERATOR = 'moderator';

    public $roles;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['roles', 'safe'],
            [['username', 'password', 'email'], 'required'],
            [['username', 'password', 'email', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
        ];
    }

    public function getId()
    {
        return $this->id;
    }

        public function getRolesDropdown()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_MODERATOR => 'Moderator',
		];
    }

    public function __construct()
    {
        $this->on(self::EVENT_AFTER_UPDATE, [$this, 'saveRoles']);
	}
    
    public function saveRoles()
    {
        \Yii::$app->authManager->revokeAll($this->getId());
        if (is_array($this->roles)) {
            foreach ($this->roles as $roleName) {
                if ($role = \Yii::$app->authManager->getRole($roleName)) {
                    \Yii::$app->authManager->assign($role, $this->getId());        
				}     
			}  
		}   
    }

    public function afterFind()
    {
        $this->roles = $this->getRoles();
    }

    public function getRoles()
    {
        $roles = \Yii::$app->authManager->getRolesByUser($this->getId());
        return ArrayHelper::getColumn($roles, 'name', false);
    }

}
