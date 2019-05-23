<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 19.05.19
 * Time: 19:59
 */

namespace app\models;

use yii\db\ActiveRecord;


class Categories extends ActiveRecord
{
    public function rules()
    {
        return [
            [['description', 'title'], 'required'],
            [['description', 'title'], 'trim'],
        ];
    }

    public function  getCategories()
    {
        $categories =  $items = Categories::find()->all();

        return $categories;
    }
}