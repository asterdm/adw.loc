<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_report_list') ?>

    <?= $form->field($model, 'client_login') ?>

    <?= $form->field($model, 'report_name') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'report_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
