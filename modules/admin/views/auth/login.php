<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">Вход</p>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username', ['template' => "<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-user form-control-feedback\"></span><div>{error}</div></div>",])->textInput(['placeholder' => 'Логин']) ?>

        <?= $form->field($model, 'password', ['template' => "<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span><div>{error}</div></div>",])->passwordInput(['placeholder' => 'Пароль']) ?>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox2">
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "{label} {input}",
                        'label' => "Запомнить"
                    ])?> 
                </div>
            </div>

            <div class="col-xs-4">
                <?= Html::submitButton('Далее', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        Впервые? <a href="<?= \yii\helpers\Url::to(['/admin/auth/signup']) ?>">Зарегистрируйтесь</a> <br>
        <a href="<?= \yii\helpers\Url::to(['/home']) ?>">Вернуться на главную</a>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->