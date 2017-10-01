<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReportList */

$this->title = $model->id_report_list;
$this->params['breadcrumbs'][] = ['label' => 'Report Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_report_list], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_report_list], [
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
            'id_report_list',
            'report_id',
            'client_id',
        ],
    ]) ?>

</div>
