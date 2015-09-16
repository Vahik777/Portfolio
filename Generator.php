<?php
namespace backend\generator\models;

use common\models\Func;
use Yii;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
use backend\generator\models\ModelGenerator;

class Generator{

    protected $moduleName;
    protected $controllerName;
    protected $namespace;
    protected $moduleDirectory;
    protected $modelName;
    protected $catDb;

    public $obModel;
    public $obController;
    public $obView;


    public function _set($moduleName,$controllerName,$modelName,$catDb){

        $this->moduleName = ucfirst($moduleName);
        $this->namespace = $moduleName;
        $this->controllerName = $controllerName;
        $this->modelName = $modelName;
        $this->moduleDirectory = Yii::getAlias('@backend/'.$moduleName.'/');
        $this->catDb = $catDb;

        $this->obModel = new ModelGenerator();
        $this->obController = new ControllerGenerator();
        $this->obView = new ViewGenerator();
    }

    public function startAll(){
        $this->generateModul();

        $this->startModel();
        $this->startController();
        $this->startViews();

        $this->obModel->addTable();
        $this->obModel->addCatTable();
    }

    public function generateModul(){

        BaseFileHelper::createDirectory($this->moduleDirectory, 509, true);

        $content = $this->modulInner();

        $moduleFullName = $this->moduleDirectory . $this->moduleName . '.php';
        $myFail = fopen($moduleFullName, "w");
        fwrite($myFail,$content);
        fclose($myFail);

        return true;
    }



    public function modulInner(){
        $directory = Yii::getAlias('@backend/generator/templates/module.txt');
        $file = file_get_contents($directory);

        $file = str_replace('@moduleNamespace',$this->namespace,$file);
        $file = str_replace('@moduleName',$this->moduleName,$file);

        return $file;
        //Func::d($file);

    }


    protected function startModel(){
        $this->obModel->_set(
            $this->modelName,
            $this->moduleDirectory,
            $this->namespace,
            $this->catDb
        );

        $this->obModel->generateModel();
        $this->obModel->generateCatModel();
        $this->obModel->generateCatTree();
    }

    public function startController(){
        $this->obController->_set(
            $this->modelName,
            $this->moduleDirectory,
            $this->namespace,
            $this->controllerName
        );

        $this->obController->generateController();
        $this->obController->generateCategory();
    }

    public function startViews(){
        $this->obView->_set(
            $this->namespace,
            $this->controllerName,
            $this->moduleDirectory
        );


        $this->obView->generateView();
    }

}