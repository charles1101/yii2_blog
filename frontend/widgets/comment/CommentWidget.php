<?php
/**
 * Created by PhpStorm.
 * User: CHARLES
 * Date: 2017/10/3
 * Time: 11:59
 */
namespace frontend\widgets\comment;

/**
 * 评论组件
 */

use yii\bootstrap\Widget;
use frontend\models\CommentForm;

Class CommentWidget extends Widget
{
    public function run()
    {
        $comment = new CommentForm();
        $data['comment'] = $comment->getList();
        return $this->render('index',['data'=>$data]);
    }
}