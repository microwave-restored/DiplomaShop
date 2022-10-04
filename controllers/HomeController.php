<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use app\models\ContactForm;
use app\models\CalcForm;
use app\models\ProfileForm;
use app\models\Posts;
use app\models\Schet;
use app\models\User;
use yii\web\Request;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;


class HomeController extends AppController
{

    public function actionIndex()
    {
        $id = 2;
        $category = Category::findOne($id);
        if(empty($category)){
            throw new NotFoundHttpException('Такой категории нет...');
        }

        //$products = Product::find()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('offers', 'products', 'category', 'pages'));
    }

    public function actionContact()
    {
       
        $model = new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->contact(\Yii::$app->params['emailto'])) {
            \Yii::$app->session->setFlash('success', 'Письмо отправлено');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionCalc()
    {
        
        $model = new CalcForm();
        if ($model->load(\Yii::$app->request->post()) ) {
            $a = $model->weight;
            $b = $model->num;
            $d = 1.5;
            $g = 2.4;
            if ($b == 'yes') {
                 $c = $a * $d;
			}
            else {$c = $a * $g;}
            \Yii::$app->session->setFlash('success', 'Работает');
            return $this->render('calc', [
                'model' => $model,
                'a' => $a,
                'b' => $b,
                'c' => $c,
            ]);
        } else {
            return $this->render('calc', [
                'model' => $model,
            ]);
        }
    }

    public function actionProfile()
    {
        $model = new ProfileForm();
        return $this->render('profile', [
        'model' => $model,
        ]);
    }
}