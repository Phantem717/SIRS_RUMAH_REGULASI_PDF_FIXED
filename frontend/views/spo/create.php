<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TrSpo $model */

$this->title = 'Upload SPO';
$this->params['breadcrumbs'][] = ['label' => 'Rumah Regulasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-spo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
