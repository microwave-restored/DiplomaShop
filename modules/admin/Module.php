<?php

namespace app\modules\admin;

use yii\filters\AccessControl;


/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view'],
                        'roles' => ['admin','moderator'],
					],
                    [
                        'allow' => true,
                        'actions' => ['delete','update','create'],
                        'roles' => ['admin'],
			        ],
                    [
                        'allow' => true,
                        'actions' => ['redirect', 'logout'],
                        'roles' => ['client', 'admin', 'moderator'],
			        ],
                ],
            ],
        ];
    }
}
