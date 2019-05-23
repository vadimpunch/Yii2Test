<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;

$form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data',
        ],
]) ?>
<?= $form->field($model, 'description')->label(Yii::t('app', 'Description')) ?>
<?= $form->field($model, 'cost')->label(Yii::t('app', 'Cost')) ?>
<?= $form->field($model, 'photos')->fileInput()->label(Yii::t('app', 'Photo')) ?>
<?= $form->field($model, 'category_id')->dropdownList(
    Categories::find()->select(['title', 'id'])->indexBy('id')->column(),
    ['prompt'=>Yii::t('app', 'Select category')]
) ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', 'Add item'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>