<?php
namespace frontend\controllers\base;
/**
 * 基础控制器
 */
use yii\web\controller;

class BaseController extends Controller{
    public function beforeAction($action)
    {
        if(!parent::beforeAction($action)){
            return false;
        }
        return true;
    }
}