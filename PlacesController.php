<?php

namespace frontend\controllers;

use frontend\models\Search;
use Yii;
use common\models\User;
use backend\models\Lang;
use yii\data\Pagination;
use yii\db\Query;



use backend\moduls\products\models\ProductCategory;
use backend\moduls\products\models\ProductsRu;
use backend\moduls\products\models\ProductsAm;
use backend\moduls\products\models\ProductsEn;
use backend\moduls\products\models\CategoryRel;

class PlacesController extends \yii\web\Controller
{
    public $model;
    public $lang;

    public function init()
    {
        $lang = Lang::getCurrent()->url;
        $model['am'] = new ProductsAm;
        $model['ru'] = new ProductsRu;
        $model['en'] = new ProductsEn;

        $this->lang = $lang;
        $this->model= $model[$lang];
    }

    function actionIndex($id,$view='grid')
    {

        $cats = $this->getAllCats($id);

        $order[1]['by'] = 'created ASC';
        $order[2]['by'] = 'created DESC';
        $order[3]['by'] = 'rating DESC';


        if ($_POST) {
            $sort = $_POST['sort'];

            $query = $this->model->find()
                ->where(['IN', 'cat_id', $cats])
                ->orderBy($order[$sort]['by']);
        }else{
            $query = $this->model->find()->where(['IN', 'id', $cats]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>20]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        if(!isset($sort)){
            $sort = 1;
        }

        $category = ProductCategory::findAll($id);

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'lang' => $this->lang,
            'id' => $id,
            'view' => $view,
            'sort' =>$sort,
            'category' =>$category,
        ]);

    }

    public function getAllCats($id){
        $model = new CategoryRel();

        $result = $model->find()->select('product_id')->where(['cat_id' => $id])->all();

        foreach ($result as $one) {
            $cats[] = $one->product_id;
        }

        return $cats;

    }

    public function actionSearch(){
        $model = new Search();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $result = $model->getBySearch($model);

            if(!$result){
                Yii::$app->session->setFlash('error', 'Nothing was found.');
            }
            //User::d($result);
            /*$countQuery = clone $result;
            $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>20]);
            $models = $result->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

            if(!isset($sort)){
                $sort = 1;
            }*/

            return $this->render('search', [
                'models' => $result,
                //'pages' => $pages,
                'lang' => $this->lang,
                //'sort' =>$sort,
            ]);
        }
    }


    public static  function getCats(){
        $model = new ProductCategory();
        $result = $model->find()
            ->all();

        return $result;
    }

    public function test($params){

    }


}
