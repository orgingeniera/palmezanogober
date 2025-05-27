<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="paciente-reportes-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'paciente_id')->dropDownList(
        $items, // Tus datos de pacientes (id => nombre)
        ['prompt' => 'Selecciona un Paciente'] // Una opción por defecto opcional
    )->label('Paciente') ?>

    <?= $form->field($model, 'fecha_reporte')->input('date') ?>

    <?= $form->field($model, 'fecha_ingreso')->input('date') ?>
    
    <?= $form->field($model, 'fecha_notificacion_sivigila')->input('date') ?>


   <?= $form->field($model, 'ips_urgencia')->dropDownList([
    'Hospital Santa Cruz de URUMITA' => 'Hospital Santa Cruz de URUMITA',
    'HOSPITAL SANTO TOMAS' => 'HOSPITAL SANTO TOMAS',
    'HOSPITAL NUESTRA SEÑORA DEL PILAR' => 'HOSPITAL NUESTRA SEÑORA DEL PILAR',
    'ESE HOSPITAL NUESTRA SEÑORA DEL CARMEN' => 'ESE HOSPITAL NUESTRA SEÑORA DEL CARMEN',
    'E.S.E Hospital de Nazareth' => 'E.S.E Hospital de Nazareth',
    'ESE HOSPITAL ARMANDO PABÓN LÓPEZ' => 'ESE HOSPITAL ARMANDO PABÓN LÓPEZ',
    'Clinica alta complejidad san. Juan Bautista' => 'Clinica alta complejidad san. Juan Bautista',
    'Clínica de Especialistas Guajira s.a.' => 'Clínica de Especialistas Guajira s.a.',
    'Ese hospital santa teresa de jesus de avila' => 'Ese hospital santa teresa de jesus de avila',
    'HOSPITAL SANTA RITA DE CASSIA' => 'HOSPITAL SANTA RITA DE CASSIA',
    'Hospital Donaldo Saul Moron Manjarrez' => 'Hospital Donaldo Saul Moron Manjarrez',
    'Clinivida salud ips' => 'Clinivida salud ips',
    'Unidad Materno Infantil Talapuin SAS' => 'Unidad Materno Infantil Talapuin SAS',
    'ESE HOSPITAL SAN AGUSTIN' => 'ESE HOSPITAL SAN AGUSTIN',
    'CLINICA MAICAO' => 'CLINICA MAICAO',
    'ASOCABILDOS IPSI' => 'ASOCABILDOS IPSI',
    'Clinica Cedes Ltda' => 'Clinica Cedes Ltda',
    'ESE HOSPITAL SAN LUCAS' => 'ESE HOSPITAL SAN LUCAS',
    'ESE HOSPITAL NUESTRA SEÑORA DEL PERPETUO SOCORRO' => 'ESE HOSPITAL NUESTRA SEÑORA DEL PERPETUO SOCORRO',
    'ESE HOSPITAL NUESTRA SEÑORA DE LOS REMEDIOS' => 'ESE HOSPITAL NUESTRA SEÑORA DE LOS REMEDIOS',
    'ESE HOSPITAL SAN JOSE DE MAICAO' => 'ESE HOSPITAL SAN JOSE DE MAICAO',
    'ESE HOSPITAL SAN RAFAEL NIVEL II' => 'ESE HOSPITAL SAN RAFAEL NIVEL II',
    'UNIDAD DE CUIDADOS INTENSIVOS RENACER' => 'UNIDAD DE CUIDADOS INTENSIVOS RENACER',
    'ESE Hospital San Rafael Albania' => 'ESE Hospital San Rafael Albania',
    'IPSI ANASHIWAYA' => 'IPSI ANASHIWAYA',
    'CLINICA SOMEDA' => 'CLINICA SOMEDA',
], ['prompt' => 'Seleccione un hospital']) ?>


    <?= $form->field($model, 'pertenencia_etnica')->dropDownList([
        'WAYU' => 'WAYU',
        'KOGUI' => 'KOGUI',
        'ZENU' => 'ZENU',
        'WIWA' => 'WIWA',
        'ARUACO' => 'ARUACO',
    ], ['prompt' => 'Seleccione pertenencia étnica']) ?>

    <?= $form->field($model, 'eps')->dropDownList([
        'SANITAS' => 'E.P.S SANITAS S.A',
        'NUEVA_EPS' => 'LA NUEVA EPS S.A',
        'SALUD_TOTAL' => 'SALUD TOTAL S.A E.P.S',
        'SANIDAD_MILITAR' => 'SANIDAD MILITAR',
        'FOMAG' => 'FOMAG',
        'ANAS_WAYUU' => 'ANAS WAYUU',
        'EPS_FAMILIAR' => 'EPS FAMILIAR DE COLOMBIA',
        'SANIDAD_POLICIAL' => 'SANIDAD POLICIAL',
        'DUSAKAWI' => 'DUSAKAWI',
        'CAJACOPI' => 'CAJACOPI',
        'NO_ASEGURADAS' => 'NO ASEGURADAS',
    ], ['prompt' => 'Seleccione EPS']) ?>

    <?= $form->field($model, 'diagnostico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'evolucion_seguimiento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'escala_alerta_temprana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teleapoyo_hosp_padrino')->dropDownList([
        'Sí' => 'Sí',
        'No' => 'No',
    ], ['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'hospital_padrino')->dropDownList([
        'SANJUAN' => 'SANJUAN',
        'SAN JOSE' => 'SAN JOSE',
        'CEDES' => 'CEDES',
    ], ['prompt' => 'Seleccione un hospital padrino']) ?>

    <?= $form->field($model, 'respuesta_hosp_padrino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requiere_remision')->dropDownList([
        'Sí' => 'Sí',
        'No' => 'No',
    ], ['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'hora_remision')->input('time') ?>

    <?= $form->field($model, 'entidad_remitida')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'fecha_egreso')->input('date') ?>

 

    <?= $form->field($model, 'motivo_egreso')->dropDownList([
        'ALTA MEDICA' => 'ALTA MEDICA',
        'SIN CRITERIO INCLUSION MME (LO NOTIFICARON MAL)' => 'SIN CRITERIO INCLUSION MME (LO NOTIFICARON MAL)',
        'MUERTE' => 'MUERTE',
        'REMISION' => 'REMISION',
    ], ['prompt' => 'Seleccione un motivo de egreso']) ?>

    <?= $form->field($model, 'responsable_reporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_reporta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
