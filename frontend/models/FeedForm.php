<?php
/**
 * Created by PhpStorm.
 * User: CHARLES
 * Date: 2017/8/15
 * Time: 19:55
 */
namespace frontend\models;

use Yii;
use common\models\base\BaseModel;
use common\models\FeedModel;

class FeedForm extends BaseModel{
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
        $model = new FeedModel();
        $res = $model->find()
            ->limit(10)
            ->with('user')
            ->orderBy(['id'=>SORT_DESC])
            ->asArray()
            ->all();
        return $res ? $res : [];
    }

    /**
     * 留言保存
     */
    public function create()
    {
        try{
            $model = new FeedModel();
            $model->user_id = Yii::$app->user->identity->id;
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
}