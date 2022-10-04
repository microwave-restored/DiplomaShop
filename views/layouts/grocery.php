<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\filters\AccessControl;

AppAsset::register($this);
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <base href="/">
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!-- header -->
<div class="agileits_header">
    <div class="w3l_offers">
        <a href="<?= \yii\helpers\Url::to(['/home/contact']) ?>">Пишите нам</a>
    </div>
    <div class="w3l_search">
        <form action="<?= \yii\helpers\Url::to(['category/search']) ?>" method="get">
            <input type="text" name="q" value="Поиск по товару..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Поиск по товару...';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>
    <div class="product_list_header">
        <button onclick="getCart()" type="button" class="button" data-toggle="modal" data-target="#modal-cart">
            <span class="cart-sum">
                <?= $_SESSION['cart.sum'] ?? '0' ?> ₽
            </span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Корзина</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                        <a href="<?= \yii\helpers\Url::to(['cart/checkout']) ?>" class="btn btn-success">Оформить заказ</a>
                        <button onclick="clearCart()" type="button" class="btn btn-danger">Очистить корзину</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w3l_header_right">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            <?php if (!Yii::$app->user->isGuest): ?>
                            <li><?= Yii::$app->user->identity['username'] ?></li>
                            <?php endif; ?>
                            <?php if (!Yii::$app->user->isGuest && Yii::$app->user->can('viewAdmin')): ?>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>">Админ панель</a></li>
                            <?php endif; ?>
                            <?php if (!Yii::$app->user->isGuest): ?>
                            <li><a href="<?= \yii\helpers\Url::to(['/home/profile']) ?>">Личный кабинет</a></li>
                            <?php endif; ?>
                            <?php if (!Yii::$app->user->isGuest): ?>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin/auth/logout']) ?>">Сменить пользователя</a></li>
                            <?php endif; ?>
                            <?php if (Yii::$app->user->isGuest): ?>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin/auth/login']) ?>">Войти</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin/auth/signup']) ?>">Регистрация</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="w3l_header_right1">
        <!-- <h2><a href="mail.html">Пишите нам</a></h2> -->
        <?php if (Yii::$app->user->isGuest): ?>
        <h2><a href="<?= \yii\helpers\Url::to(['/admin/auth/login']) ?>">Войти</a></h2>
        <?php else: ?>
        <h2> <a><?= Yii::$app->user->identity['username'] ?></a> </h2>
        <?php endif; ?>
    </div>
    <div class="clearfix"> </div>
</div>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="<?= \yii\helpers\Url::home() ?>"><span>Магазин</span>Sportpit</a></h1>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="<?= \yii\helpers\Url::to(['/']) ?>">Главная</a><i>/</i></li>
                <li><a href="about.html">О нас</a><i>/</i></li>
                <li><a href="<?= \yii\helpers\Url::to(['/article/index']) ?>">Статьи</a><i>/</i></li>
                <li><a href="<?= \yii\helpers\Url::to(['/home/calc']) ?>">Калькулятор протеина</a></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->

<?= $content ?>

<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>Получайте оповещения о новых акциях</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                <input type="submit" value="подписаться">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-3 w3_footer_grid">
            <h3>information</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="events.html">Events</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="products.html">Best Deals</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="short-codes.html">Short Codes</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>policy info</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="faqs.html">FAQ</a></li>
                <li><a href="privacy.html">privacy policy</a></li>
                <li><a href="privacy.html">terms of use</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>what in stores</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="pet.html">Pet Food</a></li>
                <li><a href="frozen.html">Frozen Snacks</a></li>
                <li><a href="kitchen.html">Kitchen</a></li>
                <li><a href="products.html">Branded Foods</a></li>
                <li><a href="household.html">Households</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>twitter posts</h3>
            <ul class="w3_footer_grid_list1">
                <li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam <a href="#">http://sd.ds/13jklf#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
                <li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam <a href="#">http://fd.uf/56hfg#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% secure payments</h4>
                    <img src="images/card.png" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>connect with us</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="wthree_footer_copy">
            <p>© 2022 Sportpit Shop by <a href="http://w3layouts.com/"> Bocharov</a></p>
        </div>
    </div>
</div>
<!-- //footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

