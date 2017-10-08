<?php
namespace frontend\controllers;
/**
 * 文章控制器
 */
use frontend\models\CommentForm;
use common\models\PostExtendModel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use frontend\models\PostForm;
use frontend\controllers\base\BaseController;
use common\models\CatModel;
use Yii;

class PostController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create','upload','ueditor'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['create','upload','ueditor'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    '*' => ['get','post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
		    "uploadFilePath" => "/usr/share/nginx/html/yii2_blog/frontend/web", /* 文件保存绝对路径   */
                ]
            ],

            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                //上传图片配置
                'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
		"uploadFilePath" => "/usr/share/nginx/html/yii2_blog/frontend/web", /* 文件保存绝对
路径   */
                ]
            ]
        ];
    }
    /**
     * 文章列表
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 创建文章
     */
    public function actionCreate()
    {
        $model = new PostForm();
        //定义场景
        $model->setScenario(PostForm::SCENARIOS_CREATE);
        if($model->load(Yii::$app->request->post())&&$model->validate()){
            if(!$model->create()){
                Yii::$app->session->setFlash('warning',$model->_lastError);
            }else{
                return $this->redirect(['post/view','id'=>$model->id]);
            }
        }
        //获取所有分类
        $cat = CatModel::getAllCats();
        return $this->render('create',['model'=>$model,'cat'=>$cat]);
    }

    /**
     * 文章详情
     */
    public function actionView($id)
    {
        $model = new PostForm();
        $data = $model->getViewById($id);

        //文章统计
        $model = new PostExtendModel();
        $model->upCounter(['post_id'=>$id],'browser',1);

        return $this->render('view',['data'=>$data]);
    }

    /**
     * 评论添加
     */
    public function actionAddComment()
    {
        $model = new CommentForm();
        $model->content = Yii::$app->request->post('content');
        if($model->validate()){
            if($model->createComment()){
                return json_encode(['status'=>true]);
            }
        }
        return json_encode(['status'=>false,'msg'=>'发布失败！']);
    }
}
