<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportList */

$this->title = 'Update Report List: ' . $model->id_report_list;
$this->params['breadcrumbs'][] = ['label' => 'Report Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_report_list, 'url' => ['view', 'id' => $model->id_report_list]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
