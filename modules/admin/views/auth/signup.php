<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">Регистрация</p>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username', ['template' => "<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-user form-control-feedback\"></span><div>{error}</div></div>",])->textInput(['placeholder' => 'Логин']) ?>

        <?= $form->field($model, 'password', ['template' => "<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span><div>{error}</div></div>",])->passwordInput(['placeholder' => 'Пароль']) ?>

        <?= $form->field($model, 'email', ['template' => "<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span><div>{error}</div></div>",])->textInput(['placeholder' => 'Email']) ?>

        <div class="row">
            

            <div class="col-xs-4">
                <?= Html::submitButton('Далее', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div>
        </div>
        <br>
        Уже зарегистрированы? <a href="<?= \yii\helpers\Url::to(['/admin/auth/login']) ?>">Авторизуйтесь</a> <br>
        <a href="<?= \yii\helpers\Url::to(['/home']) ?>">Вернуться на главную</a>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->