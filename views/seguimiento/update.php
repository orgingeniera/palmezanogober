<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\seguimiento $model */

$this->title = 'Update Seguimiento: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Seguimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seguimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pacientes' => $pacientes,
    ]) ?>

</div>
