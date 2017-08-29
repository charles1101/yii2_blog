<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '内容管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除此项吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        $model->is_valid == 1 ? ($model->is_valid = '有效') : ($model->is_valid = '无效');
        $model->label_img = '<img src="http://frontend.yiiblog.com'.$model->label_img.'">';
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'summary',
            'content:ntext',
            'label_img'=>[
                'attribute'=>'label_img',
                'format'=>'raw',
            ],
            'cat.cat_name',
            'user_id',
            'user_name',
            'is_valid',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
