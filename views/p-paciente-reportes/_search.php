<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="paciente-reportes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'paciente_id') ?>

    <?= $form->field($model, 'fecha_reporte') ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?= $form->field($model, 'fecha_notificacion_sivigila') ?>

    <?php // echo $form->field($model, 'ips_urgencia') ?>

    <?php // echo $form->field($model, 'pertenencia_etnica') ?>

    <?php // echo $form->field($model, 'eps') ?>

    <?php // echo $form->field($model, 'diagnostico') ?>

    <?php // echo $form->field($model, 'evolucion_seguimiento') ?>

    <?php // echo $form->field($model, 'escala_alerta_temprana') ?>

    <?php // echo $form->field($model, 'teleapoyo_hosp_padrino') ?>

    <?php // echo $form->field($model, 'hospital_padrino') ?>

    <?php // echo $form->field($model, 'respuesta_hosp_padrino') ?>

    <?php // echo $form->field($model, 'requiere_remision') ?>

    <?php // echo $form->field($model, 'hora_remision') ?>

    <?php // echo $form->field($model, 'entidad_remitida') ?>

    <?php // echo $form->field($model, 'fecha_egreso') ?>

    <?php // echo $form->field($model, 'motivo_egreso') ?>

    <?php // echo $form->field($model, 'responsable_reporte') ?>

    <?php // echo $form->field($model, 'telefono_reporta') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
