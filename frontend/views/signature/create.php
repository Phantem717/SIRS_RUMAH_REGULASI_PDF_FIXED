<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TrSignatureTimeline $model */

$this->title = 'Create Tr Signature Timeline';
$this->params['breadcrumbs'][] = ['label' => 'Tr Signature Timelines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-signature-timeline-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
