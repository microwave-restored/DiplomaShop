<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Домой</a><span>|</span></li>
            <li>Оформление заказа</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/inc/sidebar') ?>
	<div class="w3l_banner_nav_right">
	
<!-- about -->
		<div class="privacy about">
			<h3>Оплата прошла успешно!</h3>
			<br>
			<h4>Хотите получить чек на почту?</h4>
			<br>
			<a href="<?= \yii\helpers\Url::to(['cart/print']) ?>" class="btn btn-success">Да</a>
			<a href="<?= \yii\helpers\Url::to(['cart/home']) ?>" class="btn btn-danger">Нет</a>
			<?php 
			//debug($order->email);
			//debug($email);
			//debug($_SESSION);
			//debug($_COOKIE);
			//debug($_COOKIE['email']);
			//debug($link);
			//debug($session['cart']);
			?>
			
		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->