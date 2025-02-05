<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\TrSpo $model */

$this->title = $model->TrSpo_name;
$this->params['breadcrumbs'][] = ['label' => 'Rumah Regulasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCsrfMetaTags();
\yii\web\YiiAsset::register($this);
?>
<div class="tr-spo-view">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'TrSpo_id' => $model->TrSpo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Save', ['save','file' => 'briefing-intern (1).pdf', 'TrSpo_id' => $model->TrSpo_id], ['class' => 'btn btn-primary'] ) ?>

        <?= Html::a('Delete', ['delete', 'TrSpo_id' => $model->TrSpo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

          <?= Html::a('Download PDF', ['view-pdf', 'fileName' => $model->TrSpo_file], ['class' => 'btn btn-primary']) ?>

<?= Html::a('View in PDF.js', ['pdf-js','TrSpo_id' => $model->TrSpo_id, 'fileName'=>$model->TrSpo_file ], ['class' => 'btn btn-secondary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TrSpo_id',
            'TrSpo_name',
            'TrSpo_type',
            'TrSpo_additional_text',
            'TrSpo_file',
            'MsUnit_id',
            'TrSpo_created_by',
            'TrSpo_updated_by',
            'TrSpo_created_at',
            'TrSpo_updated_at',
            
        ],
    ]) ?>
 <?php 
        $file = $model->TrSpo_file;
        $file_parts = explode("/",$file);
        $file_name = end($file_parts);
        $path = Yii::$app->basePath . '/uploads/' . $file;
        if (file_exists($path)) {
            echo '<embed src="' . yii\helpers\Url::to(['site/pdfjs', 'file' => $file_name]) . '" width="100%" height="600" type="application/pdf" />';
        }
    ?>
</div>
