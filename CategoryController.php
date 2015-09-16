<?php
namespace frontend\controllers;

use yii\web\Controller;
use backend\items\models\Items;
use backend\items\models\Categories;
use common\models\Func;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class CategoryController extends Controller
{
    public $model;
    public $cats;

    public function init(){
        $this->model = new Items();
        $this->cats = new Categories();
    }

    public function actionIndex($id,$s){

        $model = $this->getItems($id);
        $title = $this->getCat($id,$s);
        $cats = $this->cats->find()->select('title,slug,id,seo_title,seo_keywords,seo_description')->where(['lang'=>'am'])->all();

        $countQuery = clone $model;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>12]);
        $models = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',[
            'model' => $models,
            'pages' => $pages,
            'title' => $title,
            'cats' => $cats,
        ]);
    }

    public function getCat($id,$s){
        $model = $this->cats;
        if(($model = $model->find()->select('title,description,img,page_title,seo_title,seo_keywords,seo_description')->where(['id' => $id,"lang" => 'am','slug' => $s])->one()) != null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getItems($id){
        $model = $this->model->find()->where(['cat_id' => $id,"lang" => 'am']);
        return $model;

    }
}