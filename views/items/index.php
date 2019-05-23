<?php

use yii\helpers\Url;
use yii\helpers\Html;



Yii::$app->session->getFlash('success');
?>


<?php foreach ($items as $item): ?>

    <div class="card" style="width: 25rem; float: left">
        <?= Html::img('@web/uploads/' . $item->photos, ['class' => 'card-img-top']) ?>
        <div class="card-body">
            <h5 class="card-title"><b><?= $item->cost . '$' ?></b></h5>
            <p class="card-text"><?= $item->description ?></p>
            <a href="<?= Url::to(['/item/' . $item->id]) ?>" class="btn btn-info"><?= Yii::t('app', 'View'); ?></a>
            <a href="<?= Url::to(['/update-item/' . $item->id]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Edit'); ?></a>
            <a href="<?= Url::to(['delete-item/' . $item->id]) ?>" class="btn btn-danger"><?= Yii::t('app', 'Delete'); ?></a>
        </div>
    </div>

<?php endforeach ?>

<a  href="<?= Url::to(['add-item/']) ?>" class="btn btn-lg btn-success add-item"><?= Yii::t('app', Yii::t('app', 'Add item'));?></a>
