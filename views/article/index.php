<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Статьи'; ?>

<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Домой</a><span>|</span></li>
            <li>Статьи</li>
        </ul>
    </div>
</div>

<div class="banner">
		<?= $this->render('//layouts/inc/sidebar') ?>
		<div class="w3l_banner_nav_right">
		<?php //var_dump($articles) ?>
		<?php if(!empty($articles)): ?>
		<div class="events-bottom">
				<?php foreach($articles as $article): ?>
				<div class="col-md-6 events_bottom_left">
					<div class="col-md-4 events_bottom_left1">
						<div class="events_bottom_left1_grid">
							<h4>12</h4>
							<p>февраля, 2022</p>
						</div>
					</div>
					<div class="col-md-8 events_bottom_left2">	
						<?= \yii\helpers\Html::img("@web/{$article->img}", ['alt' => $article->title]) ?>
						<h4><?= $article->title ?></h4>
						<ul>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i>3:20 PM</li>
							<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
						</ul>
						<p><?= $article->content ?></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<?php endforeach; ?>
				<div class="clearfix"> </div>
				<br><br><br><br>
		</div>
		<?php else: ?>
		<div class="events-bottom">
		Здесь пока нет статей...
		</div>
		<?php endif; ?>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>
	</div>