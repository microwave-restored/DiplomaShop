<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Category;
use app\modules\admin\models\Order;
use app\modules\admin\models\Product;
use app\modules\admin\models\Users;
use app\modules\admin\models\Article;

class MainController extends AppAdminController
{

    public function actionIndex()
    {
        $orders = Order::find()->count();
        $products = Product::find()->count();
        $categories = Category::find()->count();
        $users = Users::find()->count();
        $articles = Article::find()->count();
        return $this->render('index', compact('orders', 'products', 'categories', 'users', 'articles'));
    }

}