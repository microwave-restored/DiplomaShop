<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class CalcForm extends ActiveRecord
{

    public $weight, $status, $num;

    public function rules()
    {
        return [
            ['weight', 'required'],
            ['num', 'required', 'message' => 'Выберите цель'],
            ['weight', 'double'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'weight' => 'Вес',
            'num' => 'Цель',
        ];
    }

}