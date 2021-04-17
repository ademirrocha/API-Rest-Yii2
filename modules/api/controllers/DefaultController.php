<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;


class DefaultController extends ActiveController
{
    
    public $modelClass = 'app\models\News';

    //Impedir delete e update via api
    public function actions(){
        $actions = parent::actions();

        unset($actions['delete'], $actions['update']);

        return $actions;
    }
    

}
