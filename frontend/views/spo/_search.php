<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TrSpoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tr-spo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TrSpo_id') ?>

    <?= $form->field($model, 'TrSpo_name') ?>

    <?= $form->field($model, 'TrSpo_type') ?>

    <?= $form->field($model, 'TrSpo_additional_text') ?>

    <?= $form->field($model, 'MsUnit_id') ?>

    <?php // echo $form->field($model, 'TrSpo_file') ?>

    <?php // echo $form->field($model, 'TrSpo_created_by') ?>

    <?php // echo $form->field($model, 'TrSpo_updated_by') ?>

    <?php // echo $form->field($model, 'TrSpo_created_at') ?>

    <?php // echo $form->field($model, 'TrSpo_updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
