<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_report_list',
            'report_id',
            'client_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
