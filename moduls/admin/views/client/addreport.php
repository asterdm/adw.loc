<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->id_client;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= Html::beginForm(['order/update', 'id' => $id], 'post', ['enctype' => 'multipart/form-data']) ?>
    <?php//var_dump($available_report[0])?>
    

    <?= Html::checkbox('agree', true, ArrayHelper::map($available_report[0], 'id_report', 'report_description')); ?>

    <?= Html::submitButton('Submit', ['class' => 'submit']) ?>

    <?= Html::endForm() ?> 
    
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                  <?php //var_dump($attributes);die; ?>
                  <?php foreach ($attributes as $value): ?>
                <th><?= $value ?></th>
                  <?php endforeach ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reports as $value): ?>
                <tr>
                  <td><?= $value->id_report ?></td>
                  <td><?= $value->report_url ?></td>
                  <td><?= $value->report_description ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    
</div>
