<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MsUnit $model */

$this->title = 'Update Ms Unit: ' . $model->MsUnit_id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MsUnit_id, 'url' => ['view', 'MsUnit_id' => $model->MsUnit_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
