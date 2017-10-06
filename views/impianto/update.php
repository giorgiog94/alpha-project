<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Impianto */

$this->title = 'Update Impianto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Impiantos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="impianto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>