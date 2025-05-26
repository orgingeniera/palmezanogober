<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportes $model */

$this->title = 'Update Paciente Reportes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paciente Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paciente-reportes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
