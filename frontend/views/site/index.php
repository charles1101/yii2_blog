<?php

use frontend\widgets\post\PostWidget;
use frontend\widgets\banner\BannerWidget;
use frontend\widgets\chat\ChatWidget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;


$this->title = 'Charles的博客';
?>

<div class="row">
    <div class="col-lg-9">
        <!-- 图片轮播 -->
        <//?= BannerWidget::widget() ?>

        <!-- 文章列表 -->
        <?= PostWidget::widget() ?>
    </div>

    <div class="col-lg-3">
        <!-- 热门浏览 -->
        <?= HotWidget::widget(); ?>

        <!-- 标签云 -->
        <?= TagWidget::widget(); ?>

	<!-- 留言板 -->
        <?= ChatWidget::widget(); ?>
    </div>

</div>
