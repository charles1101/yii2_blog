<?php
/**
 * Created by PhpStorm.
 * User: CHARLES
 * Date: 2017/8/15
 * Time: 20:36
 */
namespace frontend\widgets\chat;

use frontend\models\FeedForm;
use yii\bootstrap\Widget;

/**
 * 留言板组件
 */
class ChatWidget extends Widget
{
    public function run()
    {
        $feed = new FeedForm();
        $data['feed'] = $feed->getList();
        return $this->render('index',['data'=>$data]);
    }
}