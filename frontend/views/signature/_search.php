<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TrSignatureTimelineSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tr-signature-timeline-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TrSpo_id') ?>

    <?= $form->field($model, 'TrSignatureTimeline_id') ?>

    <?= $form->field($model, 'TrSignatureCreatedBy') ?>

    <?= $form->field($model, 'TrSignatureCreatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
