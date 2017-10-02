<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use frontend\widgets\chat\ChatWidget;

$this->title = '留言';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="row">
        <div class="col-lg-7">
            <!-- 留言板 -->
            <?= ChatWidget::widget()?>
	</div>
    </div>

</div>
