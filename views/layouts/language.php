<?php

use yii\bootstrap\Html;


if (Yii::$app->language == 'ru')
{
    echo  Html::a('English', array_merge(Yii::$app->request->get(), [Yii::$app->controller->route, 'language' => 'en']));

} else {

    echo  Html::a('Русский', array_merge(Yii::$app->request->get(), [Yii::$app->controller->route, 'language' => 'ru']));

}