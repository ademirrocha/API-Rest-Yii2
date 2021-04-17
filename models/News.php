<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $staus
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['staus'], 'integer'],
            [['title'], 'string', 'max' => 52],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'staus' => 'Staus',
        ];
    }

    public function fields(){
        return [
            'id',
            'title',
            'text' => 'body',
            'status' => function(News $model) {
                return ($model->staus == true ? "Ativo" : 'Inativo');
            }
        ];
    }
}
