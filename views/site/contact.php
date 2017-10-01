<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="row">  
<div class="site-contact col-sm-offset-4 col-sm-6 col-md-6 col-lg-11" style="margin-top: 80px">
    <h1><?= Html::encode($this->title) ?></h1>
        <p>Пожалуйста, заполните обязательные поля. </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
    
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
</div>
</div>


</div>
