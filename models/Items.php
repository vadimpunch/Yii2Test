<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 19.05.19
 * Time: 14:14
 */

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Categories;
use app\models\Comments;


class Items extends ActiveRecord
{

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['item_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['description', 'cost', 'category_id'], 'required'],
            [['description', 'cost'], 'trim'],
            ['photos', 'image', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 10240 * 10240],
            ['cost', 'number']
        ];
    }


}