<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Личный кабинет'; ?>

<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Домой</a><span>|</span></li>
            <li>Личный кабинет</li>
        </ul>
    </div>
</div>

<div class="banner">
		<?= $this->render('//layouts/inc/sidebar') ?>
		<div class="w3l_banner_nav_right">
<!-- mail -->
		<div class="mail">
			<h3>Личный кабинет</h3>
			<div class="agileinfo_mail_grids">
				<?php if (Yii::$app->session->hasFlash('success')): ?>
				<div class="col-md-6 agileinfo_mail_grid_right">
				Спасибо за обращение к нам. Мы постараемся ответить вам как можно скорее.
				</div>
				<?php else: ?>
				<?php $form = ActiveForm::begin([
                'id' => 'profile-form', 
				]); ?>

				<div class="col-md-6 agileinfo_mail_grid_right">

						<div class="col-md-8 wthree_contact_left_grid">
						<?= $form->field($model, 'name')->textInput(['placeholder' => Yii::$app->user->identity['username']]) ?>
						<?= $form->field($model, 'email')->textInput(['placeholder' => Yii::$app->user->identity['email']]) ?>
						<?= $form->field($model, 'password')->passwordInput(['placeholder' => '******']) ?>
						<?= $form->field($model, 'prot')->textInput(['placeholder' => Yii::$app->user->identity['prot']]) ?>
						
						</div>
						<div class="clearfix"> </div>
						<div class="col-xs-4">
						<?= Html::submitButton('Обновить', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
						</div>

					<?php ActiveForm::end(); ?>
    
					<?php endif; ?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>
	</div>