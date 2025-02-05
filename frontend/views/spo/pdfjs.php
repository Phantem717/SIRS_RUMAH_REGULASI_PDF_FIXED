<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var common\models\TrSpo $model */
$this->title = 'View PDF';
$this->params['breadcrumbs'][] = ['label' => 'Rumah Regulasi', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => 'Rumah Regulasi', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);?>





<h2><?= Html::encode($this->title) ?></h2>

<?= Html::a('Download PDF', ['view-pdf', 'fileName' => $file], ['class' => 'btn btn-primary mb-5']) ?>

<div class="d-flex justify-content-center">
<iframe src="<?= Yii::getAlias('@web') . '/pdfjs/web/viewer.html?file=' . urlencode($file) ?>"
        width="75%" height="700px" ></iframe>
</div>


