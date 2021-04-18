<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class FormatterController extends Controller
{
    public function actionIndex()
    {

        $appLang = Yii::$app->language;
        /** @var MyFormatter $formatter */
        $formatter = Yii::$app->formatter;
        $data = [
            'percent' => $formatter->asPercent(0.563272, 2),
            'boolean' => $formatter->asBoolean(true),
            'email' => $formatter->asEmail('tiademir.rocha93@gmail.com'),
            'NText' => $formatter->asNtext("Ademir\nRocha\nFerreira"),
            'data_default' => $formatter->asDate(date('Y-m-d')),
            'data_short' => $formatter->asDate(date('Y-m-d'), 'short'),
            'data_medium' => $formatter->asDate(date('Y-m-d'), 'medium'),
            'data_long' => $formatter->asDate(date('Y-m-d'), 'long'),
            'data_full' => $formatter->asDate(date('Y-m-d'), 'full'),
            'data_custom' => $formatter->asDate(date('Y-m-d')),
            'data_formate_php' => $formatter->asDate(date('Y-m-d')),
            'currency' => $formatter->asCurrency(12345.73),
            'byte_conversion' => $formatter->asShortSize(102400),
            'cpf' => $formatter->asCpf('11046755609'),
            'cep' => $formatter->asCep('3868000'),
            'cnpj' => $formatter->asCnpj('06326067000105')
        ];

        return $this->render('index', [
            'lang' => $appLang,
            'data' => $data
        ]);
    }

}
