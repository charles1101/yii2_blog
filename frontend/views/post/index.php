<?php
use frontend\widgets\post\PostWidget;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-lg-9">
        <?=PostWidget::widget()?>
    </div>
    <div class="col-lg-3">
	<a href="<?= Url::to('/post/create') ?>" class="btn btn-success btn-block btn-post">创建文章</a
    </div>
</div>
