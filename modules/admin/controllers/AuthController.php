<?php
namespace app\modules\admin\controllers;

use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;

use Yii;

class AuthController extends AppAdminController
{

    public $layout = 'auth';

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/home');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->can('viewAdmin')){
            return $this->redirect('/admin');
            }
        return $this->redirect('/home');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/admin');
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;

            if($user->save()) {
                $authManager = Yii::$app->getAuthManager();
                $role = $authManager->getRole('client');
                $authManager->assign($role, $user->getId());
                \Yii::$app->user->login($user);

                return $this->redirect('/home');
			}
		}
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionRedirect()
    {
        return $this->redirect('/home');
    }

}