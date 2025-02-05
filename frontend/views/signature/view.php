<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\TrSignatureTimeline $model */

$this->title = $model->TrSignatureTimeline_id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Signature Timelines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tr-signature-timeline-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'TrSignatureTimeline_id' => $model->TrSignatureTimeline_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'TrSignatureTimeline_id' => $model->TrSignatureTimeline_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TrSpo_id',
            'TrSignatureTimeline_id:datetime',
            'TrSignatureCreatedBy',
            'TrSignatureCreatedAt',
        ],
    ]) ?>

</div>
