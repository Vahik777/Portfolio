<?php
namespace frontend\controllers;

use yii\web\Controller;
use backend\posts\models\Posts;
use backend\posts\models\Categories;
use common\models\Func;
use yii\web\NotFoundHttpException;



class PostsController extends Controller
{
    public $model;

    public function init(){
        $this->model = new Posts();
    }

    public function actionIndex($s){
        $post = $this->getPost($s);

        return $this->render('index',[
            'post' => $post
        ]);
    }

    public function actionCategory(){
        $posts = $this->model->find()->where(['lang'=>'am'])->all();
        $meta = Categories::find()->where(["id" => 74])->select('seo_title,seo_keywords,seo_description')->one();

        return $this->render('category',[
            'posts' => $posts,
            'meta' => $meta
        ]);
    }

    public function getPost($s){
        if(($model = $this->model->find()->select('title,description,img,seo_title,seo_keywords,seo_description')->where(["lang" => 'am','slug' => $s])->one()) != null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}