<?php
namespace app\controllers;

use app\models\Cliente;
use yii\web\Controller;
use Yii;

class InsertController extends Controller {

    public function actionIndex(){


        $clientes = [
            ['name' => 'Ademir Rocha'],
            ['name' => 'Maria V'],
            ['name' => 'Maisa'],
            ['name' => 'João'],
            ['name' => 'André'],
            ['name' => 'Letícia'],
            ['name' => 'Lorena'],
            
        ];

        /*
        foreach($clientes as $cliente){
            $row = new Cliente();
            $row->name = $cliente['name'];
            $row->save();
        }*/

        Yii::$app->db->createCommand()->batchInsert(Cliente::tableName(), ['name'], $clientes)->execute();

        echo "Ok";
    }
}