<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportes $model */

$this->title = 'Create Paciente Reportes';
$this->params['breadcrumbs'][] = ['label' => 'Paciente Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-reportes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pacientes' => $pacientes,
    ]) ?>

</div>
