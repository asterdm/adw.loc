<?php

use yii\helpers\Html;
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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_client], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_client], [
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
            'id_client',
            'login',
            'password',
        ],
    ]) ?>
    <?= Html::a('Add Report', ['add-report', 'id' => $model->id_client], ['class' => 'btn btn-primary']) ?>
     
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
