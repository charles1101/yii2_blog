<?php
use frontend\widgets\post\PostWidget;
use yii\helpers\Url;

$this->title = '文章';
?>
<div class="row">
    <div class="col-lg-9">
        <?=PostWidget::widget()?>
    </div>
    <div class="col-lg-3">
	<?php if(isset(Yii::$app->user->identity->username)&&Yii::$app->user->identity->username=='charles'):?>
    	    <a href="<?= Url::to('/post/create') ?>" class="btn btn-success btn-block btn-post">创建文章</a>
        <?php endif;?>
    </div>
</div>
