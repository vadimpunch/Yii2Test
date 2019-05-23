<?php


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Comments;
use app\models\User;


$commentModel = new \app\models\Comments();
$user = Yii::$app->user->identity;
?>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?= Html::img('@web/uploads/' . $item->photos, ['class' => 'rounded float-left item-img']) ?>
            </div>
            <div class="col-md-8">
                <h3><b>Cost:</b> <?= $item->cost ?>$</h3>
                <h3><b>Desription:</b></h3>
                <div class="description"><?= $item->description ?></div>
            </div>
        </div>
    </div>


    <h1>Comments</h1>

<?php foreach ($comments as $comment): ?>
    <div class="row comment">

    <div class="col-md-3 user-inf">
    <?php if ($comment->user_id) :
        $author = User::findIdentity($comment->user_id); ?>
        <div>
            <p><b><?= $author->username ?></b></p>
        </div>
        <div>
            <p><?= $author->email; ?></p>
        </div>
    <?php if ($user && $author->id == $user->getId()): ?>
        <a href="<?= Url::to(['/edit-comment/' . $comment->id]) ?>" class="btn btn-sm btn-primary">Edit</a>
        <a href="<?= Url::to(['/delete-comment/' . $item->id]) ?>" class="btn btn-sm btn-danger">Delete</a>
    <?php endif ?>
    <?php else: ?>
        <div>
            <p><b><?= $comment->user_name ?></b></p>
        </div>
        <div>
            <p><?= $comment->user_email; ?></p>
        </div>
    <?php endif ?>
    </div>

    <div class="col-md-9 text">
        <p><i><?= $comment->text; ?></i></p>
        <?php if ($comment->updated_at):?>
        <p class="date"><?= $comment->updated_at; ?></p>
        <?php else: ?>
        <p class="date"><?= $comment->created_at; ?></p>
    <?php endif ?>
    </div>
</div>


<?php endforeach ?>


<?php
$form = ActiveForm::begin([
    'action' => '/add-comment',
    'options' => [
        'class' => 'form-horizontal comment-form',
    ],
]) ?>
<?= $form->field($commentModel, 'text')->textarea(['rows' => 5, 'cols' => 5])->label(Yii::t('app', 'Enter comment')); ?>
<?php if ($user) : ?>
    <?= $form->field($commentModel, 'user_id')->hiddenInput(['value' => 'hidden value'])->label(''); ?>
<?php else : ?>
    <?= $form->field($commentModel, 'user_name') ?>
    <?= $form->field($commentModel, 'user_email') ?>
<?php endif; ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', 'Add comment'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?= $form->field($commentModel, 'item_id')->hiddenInput(['value' => $item->id])->label(''); ?>

<?php ActiveForm::end() ?>