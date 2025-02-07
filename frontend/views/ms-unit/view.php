<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\MsUnit $model */

$this->title = $model->MsUnit_id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ms-unit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'MsUnit_id' => $model->MsUnit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'MsUnit_id' => $model->MsUnit_id], [
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
            'MsUnit_id',
            'MsUnit_name',
        ],
    ]) ?>

</div>
