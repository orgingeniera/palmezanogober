<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SeguimientoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="seguimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'evolucion_seguimiento') ?>

    <?= $form->field($model, 'escala_alerta_temprana') ?>

    <?= $form->field($model, 'teleapoyo_hosp_padrino') ?>

    <?= $form->field($model, 'hospital_padrino') ?>

    <?php // echo $form->field($model, 'respuesta_hosp_padrino') ?>

    <?php // echo $form->field($model, 'requiere_remision') ?>

    <?php // echo $form->field($model, 'hora_remision') ?>

    <?php // echo $form->field($model, 'entidad_remitida') ?>

    <?php // echo $form->field($model, 'fecha_egreso') ?>

    <?php // echo $form->field($model, 'motivo_egreso') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'id_pacientes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
