<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\seguimiento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="seguimiento-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($model, 'id_pacientes')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'pacientereporte_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'evolucion_seguimiento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'escala_alerta_temprana')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'teleapoyo_hosp_padrino')->dropDownList([
        'Sí' => 'Sí',
        'No' => 'No',
    ], ['prompt' => 'Seleccione una opción']) ?>

   <?= $form->field($model, 'hospital_padrino')->dropDownList([
         'No Aplica' => 'No Aplica',
        'SANJUAN' => 'SANJUAN',
        'SAN JOSE' => 'SAN JOSE',
        'CEDES' => 'CEDES',
    ], ['prompt' => 'Seleccione un hospital padrino']) ?>

    <?= $form->field($model, 'respuesta_hosp_padrino')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'requiere_remision')->dropDownList([
        'No Aplica' => 'No Aplica',
        'Sí' => 'Sí',
        'No' => 'No',
       
    ], ['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'tipo_remision')->dropDownList([
         'No Aplica' => 'No Aplica',    
        'vital' => 'Vital (máx. 2 horas)',
        'prioritaria' => 'Prioritaria (máx. 12 horas)',
        'no_prioritaria' => 'No prioritaria (máx. 5 días calendario)',
    ], ['prompt' => 'Seleccione el tipo de remisión']) ?>

 

    <?= $form->field($model, 'entidad_remitida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora_remision')->input('time') ?>

   <?= $form->field($model, 'motivo_egreso')->dropDownList([
         'No Aplica' => 'No Aplica',
        'ALTA MEDICA' => 'ALTA MEDICA',
        'SIN CRITERIO INCLUSION MME' => 'SIN CRITERIO INCLUSION MME',
        'MUERTE' => 'MUERTE',
        'REMISION' => 'REMISION',
    ], ['prompt' => 'Seleccione un motivo de egreso']) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
