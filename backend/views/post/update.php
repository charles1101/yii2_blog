<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->params['breadcrumbs'][] = ['label' => '内容管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="post-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
