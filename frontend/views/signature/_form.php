<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TrSignatureTimeline $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tr-signature-timeline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TrSpo_id')->textInput() ?>

    <?= $form->field($model, 'TrSignatureCreatedBy')->textInput() ?>

    <?= $form->field($model, 'TrSignatureCreatedAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
