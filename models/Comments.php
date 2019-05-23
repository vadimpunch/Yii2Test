<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 19.05.19
 * Time: 22:25
 */

namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Comments extends ActiveRecord
{

    public static function tableName()
    {
        return 'comments';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getItems()
    {
        return $this->hasOne(Items::className(), ['id' => 'user_id']);
    }



    public function rules()
    {

        if (Yii::$app->user->identity) {
            return [
                [['text'], 'required'],
                [['text'], 'trim'],
            ];
        }
        return [
            [['text', 'user_name', 'user_email'], 'required'],
            [['text', 'user_name', 'user_email'], 'trim'],
            [['user_email'], 'email']
        ];
    }



}