<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportList */

$this->title = 'Create Report List';
$this->params['breadcrumbs'][] = ['label' => 'Report Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
