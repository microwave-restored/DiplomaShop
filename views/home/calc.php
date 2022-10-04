<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Калькулятор'; ?>

<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Домой</a><span>|</span></li>
            <li>Калькулятор протеина</li>
        </ul>
    </div>
</div>

<div class="banner">
		<?= $this->render('//layouts/inc/sidebar') ?>
		<div class="w3l_banner_nav_right">

			<div class="mail">
				<h3>Калькулятор протеина</h3>
				<?php if (Yii::$app->session->hasFlash('success')): ?>
					<div class="col-md-6 agileinfo_mail_grid_right">
						<?php $form = ActiveForm::begin([
					'id' => 'calc-form', 
					]); ?>
							<div class="col-md-8 wthree_contact_left_grid">
								<?= $form->field($model, 'weight')->textInput(['placeholder' => 'Вес']) ?>
								<?= $form->field($model, 'num')
								->radioList([
									'yes' => 'Рост массы',
									'no' => 'Похудение'
								]);
								?>
							</div>
							<div class="clearfix"> </div>
							<div class="col-xs-4">
								<?= Html::submitButton('Рассчитать', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?> 
								<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
							</div>
							<?php ActiveForm::end(); ?>
					</div>
					<div class="clearfix"></div>
					<br>
					С указанными данными, количество употребляемого протеина должно составлять приблизительно <?= $c - 3 ?>-<?= $c + 3 ?> граммов.
					<?php else: ?>
					<?php $form = ActiveForm::begin([
					'id' => 'calc-form', 
					]); ?>
					<div class="col-md-6 agileinfo_mail_grid_right">
							<div class="col-md-8 wthree_contact_left_grid">
								<?= $form->field($model, 'weight')->textInput(['placeholder' => 'Вес']) ?>
								<?= $form->field($model, 'num')
								->radioList([
									'yes' => 'Рост массы',
									'no' => 'Похудение'
								]);
								?>
							</div>
							<div class="clearfix"> </div>
							<div class="col-xs-4">
								<?= Html::submitButton('Рассчитать', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
							</div>
							<?php ActiveForm::end(); ?>
							<?php endif; ?>
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
</div>