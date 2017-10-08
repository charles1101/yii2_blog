<?php
/**
 * Created by PhpStorm.
 * User: CHARLES
 * Date: 2017/8/11
 * Time: 9:32
 */
use yii\helpers\Url;
use \frontend\widgets\comment\CommentWidget;

$this->title = $data['title'];
$this->params['breadcrumbs'][] = ['label'=>'文章','url'=>['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?=$data['title']?></h1>
            <span>作者：<?=$data['user_name']?></span>
            <span>发布：<?=date('Y-m-d H:i:s',$data['created_at'])?></span>
            <span>浏览：<?=isset($data['extend']['browser']) ? $data['extend']['browser'] : 0?></span>
        </div>
        <div class="page-content">
            <?=$data['content']?>
        </div>
        <div class="page-tag">
            标签：
            <?php foreach($data['tags'] as $tag):?>
                <span><a href="#"><?=$tag?></a></span>
            <?php endforeach;?>
        </div>
        <div>
            <?=CommentWidget::widget();?>
        </div>
    </div>
    <div class="col-lg-3">

    </div>
</div>
