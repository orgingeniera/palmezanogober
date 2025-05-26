<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="paciente-reportes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paciente_id')->textInput() ?>

    <?= $form->field($model, 'fecha_reporte')->textInput() ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'fecha_notificacion_sivigila')->textInput() ?>

    <?= $form->field($model, 'ips_urgencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pertenencia_etnica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnostico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'evolucion_seguimiento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'escala_alerta_temprana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teleapoyo_hosp_padrino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospital_padrino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'respuesta_hosp_padrino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requiere_remision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora_remision')->textInput() ?>

    <?= $form->field($model, 'entidad_remitida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_egreso')->textInput() ?>

    <?= $form->field($model, 'motivo_egreso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsable_reporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_reporta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
