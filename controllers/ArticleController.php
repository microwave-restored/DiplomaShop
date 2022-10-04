<?php

namespace app\controllers;

use app\models\Article;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class ArticleController extends AppController
{

    public function actionIndex()
    {
        $this->setMeta("Статьи :: " . \Yii::$app->name);

        $query = Article::find();
        if(empty($query)){
            throw new NotFoundHttpException('Таких статей нет...');
        }
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->all();


        return $this->render('index', compact('articles','pages'));
    }
}