<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */

$this->title = "Пользователь № {$model->id}";
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
                        'confirm' => 'Вы точно хотите удалить этот заказ?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

            <div class="box-body">
                <div class="order-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'username',
                            'password',
                            'email:email',
                            [
                                'attribute' => 'роль',
                                'value' => function($user) {
                                    return implode(',', $user->getRoles());                    
								}
							],
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
