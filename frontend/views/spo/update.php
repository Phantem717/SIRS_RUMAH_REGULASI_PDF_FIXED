<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TrSpo $model */

$this->title = 'Update SPO: ' . $model->TrSpo_id;
$this->params['breadcrumbs'][] = ['label' => 'Rumah Regulasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TrSpo_id, 'url' => ['view', 'TrSpo_id' => $model->TrSpo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-spo-update">
   
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
