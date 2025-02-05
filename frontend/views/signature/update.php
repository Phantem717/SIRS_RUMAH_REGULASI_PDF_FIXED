<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TrSignatureTimeline $model */

$this->title = 'Update Tr Signature Timeline: ' . $model->TrSignatureTimeline_id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Signature Timelines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TrSignatureTimeline_id, 'url' => ['view', 'TrSignatureTimeline_id' => $model->TrSignatureTimeline_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-signature-timeline-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
