<?php
$this->title = 'Статистика магазина';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $orders ?></h3>
                <p>Заказов</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['order/index']) ?>" class="small-box-footer">
                Перейти <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $products ?></h3>
                <p>Товаров</p>
            </div>
            <div class="icon">
                <i class="fa fa-cutlery"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['product/index']) ?>" class="small-box-footer">
                Перейти <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $categories ?></h3>
                <p>Категорий</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['category/index']) ?>" class="small-box-footer">
                Перейти <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?= $articles ?></h3>
                <p>Статей</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['article/index']) ?>" class="small-box-footer">
                Перейти <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?= $users ?></h3>
                <p>Пользователей</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['category/index']) ?>" class="small-box-footer">
                Перейти <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


</div>