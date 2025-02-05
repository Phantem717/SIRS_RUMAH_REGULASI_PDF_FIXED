<?php

use common\models\TrSignatureTimeline;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TrSignatureTimelineSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tr Signature Timelines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-signature-timeline-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tr Signature Timeline', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TrSpo_id',
            'TrSignatureTimeline_id:datetime',
            'TrSignatureCreatedBy',
            'TrSignatureCreatedAt',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrSignatureTimeline $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'TrSignatureTimeline_id' => $model->TrSignatureTimeline_id]);
                 }
            ],
        ],
    ]); ?>


</div>
