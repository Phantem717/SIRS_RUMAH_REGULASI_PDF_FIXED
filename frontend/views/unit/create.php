<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MsUnit $model */

$this->title = 'Create Ms Unit';
$this->params['breadcrumbs'][] = ['label' => 'Ms Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
