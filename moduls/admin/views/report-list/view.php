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
        <?= Html::a('Update', ['update', 'id_report_list' => $model->id_report_list, 'client_id' => $model->client_id, 'report_id' => $model->report_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_report_list' => $model->id_report_list, 'client_id' => $model->client_id, 'report_id' => $model->report_id], [
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
            'client_login',
            'report_name',
            'client_id',
            'report_id',
        ],
    ]) ?>

</div>
