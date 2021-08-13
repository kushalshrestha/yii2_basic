<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
?>
<div>
    <a href="<?php echo yii\helpers\Url::to(['/article/view', 'slug' => $model->slug]) ?>"">
    <h3><?= Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?= StringHelper::truncateWords(Html::encode($model->getEncodedBody()), 40); ?>
    </div>
    <p class="text-muted text-right">
        <small>Created At: <?php echo $model->created_at; ?></small> |
        <small>Created At: <?php echo Yii::$app->formatter->asRelativeTime($model->created_at); ?></small> |
        <small>Created At: <?php echo Yii::$app->formatter->asDatetime($model->created_at); ?></small> |
        <small>Created By: <?php echo $model->createdBy->username; ?></small>
    </p>
    <hr>
</div>