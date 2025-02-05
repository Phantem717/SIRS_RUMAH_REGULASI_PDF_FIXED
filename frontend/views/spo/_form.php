<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
/** @var yii\web\View $this */
/** @var common\models\TrSpo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tr-spo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TrSpo_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'MsUnit_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'TrSpo_type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'TrSpo_additional_text')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'TrSpo_file')->fileInput() ?> 


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
