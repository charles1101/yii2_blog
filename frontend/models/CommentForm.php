<?php
/**
 * Created by PhpStorm.
 * User: CHARLES
 * Date: 2017/10/3
 * Time: 22:54
 */
namespace frontend\models;

use Yii;
use common\models\base\BaseModel;
use common\models\CommentModel;

class CommentForm extends BaseModel{
    public $content;
    public $_lastError;

    public function rules()
    {
        return [
            ['content','required'],
            ['content','string','max'=>255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'=>'ID',
            'content'=>'内容'
        ];
    }

    public function getList()
    {
        $model = new CommentModel();
        $res = $model->find()
            ->limit(10)
            ->with('user')
            ->orderBy(['id'=>SORT_DESC])
            ->asArray()
            ->all();
        return $res ? $res : [];
    }

    /**
     * 评论保存
     */
    public function createComment()
    {
        try{
            $model = new CommentModel();
            $model->user_id = Yii::$app->user->identity->id;
            $model->post_id = $this->_getPostId();
            $model->content = $this->content;
            $model->created_at = time();
            if(!$model->save()){
                throw new \Exception('保存失败！');
            }
            return true;
        }catch(\Exception $e){
            $this->_lastError = $e->getMessage();
            return false;
        }
    }

    public function _getPostId()
    {
        $string = $_SERVER['HTTP_REFERER'];
        $post_id = substr($string,strpos($string,'=')+1);
        return $post_id;
    }

}