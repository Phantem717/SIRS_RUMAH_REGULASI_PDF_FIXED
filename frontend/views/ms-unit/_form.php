<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\MsUnit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ms-unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MsUnit_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
