<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body">
                <div class="order-index">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            'username',
                            'email:email',
                            [
                                'attribute' => 'роль',
                                'value' => function($user) {
                                    return implode(',', $user->getRoles());                    
								}
							],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Действия',
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

    


</div>
