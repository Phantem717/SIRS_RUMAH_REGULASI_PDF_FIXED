<?php

use common\models\MsUnit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\MsUnitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ms Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ms Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MsUnit_id',
            'MsUnit_name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MsUnit $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'MsUnit_id' => $model->MsUnit_id]);
                 }
            ],
        ],
    ]); ?>


</div>
