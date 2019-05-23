<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;

$form = ActiveForm::begin([
    'action' => '/categories/add-category',
    'options' => [
        'class' => 'form-horizontal',
    ],
]) ?>
<?= $form->field($model, 'title')->label(Yii::t('app', 'Title')) ?>
<?= $form->field($model, 'description')->label(Yii::t('app', 'Description')) ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', Yii::t('app', 'Add category')), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>