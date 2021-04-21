<?php
namespace app\controllers;

use app\models\Form;
use yii\base\Controller;
use Yii;

class FormController extends Controller {

    public function actionIndex(){

        $model = new Form();

        $post = Yii::$app->request->post();

        if($model->load($post) && $model->validate()){
            return $this->render('form-confirmation', [
                'model' => $model
            ]);
        }

       return $this->render('form', [
           'model' => $model
       ]);
    }
}