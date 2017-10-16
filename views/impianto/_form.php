<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Impianto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6">

<div class="impianto-form">

    <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'validationUrl' => 'validate'
    ]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indirizzo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    </div>
</div>