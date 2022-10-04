<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы точно хотите удалить этот товар?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">
                <div class="product-view">


                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'category_id',
                            'title',
                            'content:raw',
                            'price',
                            'old_price',
                            'description',
                            'keywords',
                            //'img',
                            [
                                'attribute' => 'img',
                                'value' => "/{$model->img}",
                                'format' => ['image', ['width' => '100']],
                            ],
                            'is_offer',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>


