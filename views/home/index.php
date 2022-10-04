<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            <h3>Только самые <span>лучшие</span> ингредиенты</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Сейчас">Перейти</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            <h3><span>Огромный</span> асортимент товаров</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Сейчас">Перейти</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            <h3>Скидки до <i>50%</i></h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Сейчас">Перейти</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
</div>
<!-- banner -->
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/4.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Скидочные промокоды до <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/5.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos">
                    <h3>Широкий выбор товаров от разных <span>брендов</span><i></i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/6.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos1">
                    <h3>Экономьте до <span>50%</span></h3>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- top-brands -->
<?php if(!empty($offers)): ?>
<div class="top-brands">
    <div class="container">
        <h3>Hot Offers</h3>
        <div class="agile_top_brands_grids">
            <?php foreach($offers as $offer): ?>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                            <?= \yii\helpers\Html::img('@web/images/offer.png', ['alt' => 'offer', 'class' => 'img-responsive']) ?>
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $offer->id]) ?>">
                                            <?= \yii\helpers\Html::img("@web/{$offer->img}", ['alt' => $offer->title]) ?>
                                        </a>
                                        <p><?= $offer->title ?></p>
                                        <h4>
                                            <?= $offer->price ?> ₽
                                            <?php if((float)$offer->old_price): ?>
                                            <span><?= $offer->old_price ?></span> ₽
                                            <?php endif; ?>
                                        </h4>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $offer->id]) ?>" data-id="<?= $offer->id ?>" class="button add-to-cart">Add to cart</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- //top-brands -->
<!-- fresh-vegetables -->
<div class="fresh-vegetables">
    <div class="container">
        <div class="w3ls_w3l_banner_nav_right_grid">
            <h3>Популярное</h3>
            <?php if(!empty($products)): ?>
            <div class="w3ls_w3l_banner_nav_right_grid1">
                <?php foreach($products as $product): ?>
                <div class="col-md-3 w3ls_w3l_banner_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <?php if($product->is_offer): ?>
                            <div class="agile_top_brand_left_grid_pos">
                                <?= \yii\helpers\Html::img('@web/images/offer.png', ['alt' => 'offer', 'class' => 'img-responsive']) ?>
                            </div>
                            <?php endif; ?>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                                <?= \yii\helpers\Html::img("@web/{$product->img}", ['alt' => $product->title]) ?>
                                            </a>
                                            <p><?= $product->title ?></p>
                                            <h4>
                                                <?= $product->price ?> ₽
                                                <?php if((float)$product->old_price): ?>
                                                    <span><?= $product->old_price ?> ₽</span>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <div class="snipcart-details">
                                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="button add-to-cart">Добавить</a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"> </div>

                <div class="col-md-12">
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageCssClass' => 'next test',
                        'maxButtonCount' => 10,
                    ]) ?>
                </div>

            </div>
            <?php else: ?>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    <h6>Здесь пока нет товаров...</h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- //fresh-vegetables -->

