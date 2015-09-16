<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use backend\models\Lang;
use common\models\Rating;
use yii\helpers\Url;
use frontend\models\ContactForm;
use backend\moduls\products\models\ProductsRu;
use backend\moduls\products\models\ProductsAm;
use backend\moduls\products\models\ProductsEn;
use backend\moduls\products\models\Menu;

class PlaceController extends \yii\web\Controller
{

    public $lang;

    public function init(){
        $this->lang = Lang::getCurrent()->url;
    }

    public static  function getModel(){
        $lang = Lang::getCurrent()->url;
        $model['am'] = new ProductsAm;
        $model['ru'] = new ProductsRu;
        $model['en'] = new ProductsEn;

        return $model[$lang];
    }


    public function actionIndex($id)
    {
        $lang = Lang::getCurrent()->url;
        $rating = new Rating();
        $model = $this->getModel();

        $product = $model->findOne($id);
        $reviews = $this->getReviews($id);
        $menu = Menu::getItemMenu($id);

        if ($rating->load(Yii::$app->request->post()) && $rating->validate()) {
            //User::d($_POST);

            $rating->product_id = $id;
            $rating->rating = $_POST['score_score'];
            $rating->save();

            $rating->reloadRating($id);
            return $this->refresh();
        }else {
            return $this->render('index', [
                'model' => $product,
                'lang' => $lang,
                'rating' => $rating,
                'reviews' => $reviews,
                'menu' => $menu,
            ]);
        }
    }


    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $email = ProductsAm::getEmail($_POST['id']);
            if ($model->sendEmail($email)) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    public function getReviews($id){
        $rating = new Rating();
        $items = $rating->find()
            ->where(['product_id' => $id])
            ->all();
        return $items;
    }


    public static function getLastProducts(){
        $model = self::getModel();

        $last = $model->find()
            ->limit('3')
            ->all();
        return $last;
    }

    public static function getLastTooProducts(){
        $model = self::getModel();

        $last = $model->find()
            ->limit('2')
            ->all();
        return $last;
    }
}
