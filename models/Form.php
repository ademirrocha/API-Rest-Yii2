<?php
namespace app\models;

use yii\base\Model;

class Form extends Model{

    public $name;
    public $email;
    public $idade;

    public function rules(){
        return [
            [['name', 'email', 'idade'], 'required'],
            ['email', 'email'],
            ['idade', 'number', 'integerOnly' => true]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nome Completo',
            'email' => 'E-mail',
            'idade' => 'Idade'
        ];
    }
}