<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Домой</a><span>|</span></li>
            <li>
                <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->title ?></a>
                <span>|</span>
            </li>
            <li><?= $product->title; ?></li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/inc/sidebar') ?>

    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3><?= $product->title; ?><span class="blink_me"></span></h3>
        </div>
        <div class="agileinfo_single">
            <h5><?= $product->title ?></h5>
            <div class="col-md-4 agileinfo_single_left">
                <?= \yii\helpers\Html::img("@web/{$product->img}", ['alt' => $product->title, 'id' => 'example']) ?>
            </div>
            <div class="col-md-8 agileinfo_single_right">

                <div class="w3agile_description">
                    <h4>Описание товара :</h4>
                    <p><?= $product->content ?></p>
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <h4>
                            <?= $product->price ?> ₽
                            <?php if((float)$product->old_price): ?>
                                <span><?= $product->old_price ?></span> ₽
                            <?php endif; ?>
                        </h4>
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="button add-to-cart">Добавить в корзину</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->