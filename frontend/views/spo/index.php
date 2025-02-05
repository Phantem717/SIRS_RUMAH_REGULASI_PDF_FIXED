<?php

use common\models\TrSpo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TrSpoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rumah Regulasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-spo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tr Spo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TrSpo_id',
            'TrSpo_name',
            'TrSpo_type',
            'TrSpo_additional_text',
            'MsUnit_id',
            //'TrSpo_file:ntext',
            //'TrSpo_created_by',
            //'TrSpo_updated_by',
            //'TrSpo_created_at',
            //'TrSpo_updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrSpo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'TrSpo_id' => $model->TrSpo_id]);
                 }
            ],
        ],
    ]); ?>


</div>
