<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Comments;

$form = ActiveForm::begin([
    'action' => '/edit-comment/' . $model->id,
    'options' => [
        'class' => 'form-horizontal',
    ],
]) ?>
<?= $form->field($model, 'text')->textarea(['rows' => 12, 'cols' => 5])->label(Yii::t('app', 'Enter comment')); ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', 'Edit comment'), ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
<?php ActiveForm::end() ?>