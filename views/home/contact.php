<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Напишите нам'; ?>

<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Домой</a><span>|</span></li>
            <li>Напишите нам</li>
        </ul>
    </div>
</div>

<div class="banner">
		<?= $this->render('//layouts/inc/sidebar') ?>
		<div class="w3l_banner_nav_right">
<!-- mail -->
		<div class="mail">
			<h3>Напишите нам</h3>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>адрес<span>ул. Несуществующая 13</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
						<li>email<span><a href="mailto:info@example.com">mail@store.ru</a></span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>Телефон<span>+7 (999) 999-99-99</span></li>
					</ul>
				</div>

				<?php if (Yii::$app->session->hasFlash('success')): ?>
				<div class="col-md-6 agileinfo_mail_grid_right">
				Спасибо за обращение к нам. Мы постараемся ответить вам как можно скорее.
				</div>
				<?php else: ?>
				<?php $form = ActiveForm::begin([
                'id' => 'contact-form', 
				]); ?>

				<div class="col-md-6 agileinfo_mail_grid_right">

						<div class="col-md-8 wthree_contact_left_grid">
						<?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя']) ?>
						<?= $form->field($model, 'email')->textInput(['placeholder' => 'Email']) ?>
						<?= $form->field($model, 'subject')->textInput(['placeholder' => 'Тема']) ?>
						</div>
						<div class="clearfix"> </div>
						<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
						<div class="col-xs-4">
						<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
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