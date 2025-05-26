<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pacientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pacientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tipo_identificacion')->dropDownList(
    [
        'CC' => 'Cédula de Ciudadanía',
        'TI' => 'Tarjeta de Identidad',
        'CE' => 'Cédula de Extranjería',
        'PA' => 'Pasaporte',
        'NIT' => 'Número de Identificación Tributaria',
        'OTRO' => 'Otro',
    ],
    ['prompt' => 'Selecciona el tipo de identificación...'] // Esto añade una opción "placeholder"
) ?>
    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'municipio_residencia')->dropDownList(
    [
        'Maicao' => 'Maicao',
        'Uribia' => 'Uribia',
        'Manaure' => 'Manaure',
        'Riohacha' => 'RIOHACHA', // Puedes mantener las mayúsculas si es importante
        'Dibulla' => 'Dibulla',
        'Albania' => 'Albania',
        'Barrancas' => 'Barrancas', // Corregido de "barranca" a "Barrancas" (es lo más común)
        'Fonseca' => 'Fonseca', // Corregido de "Fonceca" a "Fonseca"
        'Hatonuevo' => 'Hatonuevo', // Corregido de "hato nuevo" a "Hatonuevo"
        'Villanueva' => 'Villanueva',
        'Distracción' => 'Distracción', // Añadida tilde
        'San Juan del Cesar' => 'San Juan del Cesar', // Corregido de "Sanjuan" a "San Juan del Cesar"
        'Urumita' => 'Urumita',
        'El Molino' => 'El Molino',
        'La Jagua del Pilar' => 'La Jagua del Pilar',
    ],
    ['prompt' => 'Selecciona el municipio de residencia...'] // Añade una opción de placeholder
) ?>
<?= $form->field($model, 'pais_origen')->dropDownList(
    [
        'COL' => 'Colombia',
        'VEN' => 'Venezuela',
        'ECU' => 'Ecuador',
        'PER' => 'Perú',
        // ... añade más países aquí
    ],
    ['prompt' => 'Selecciona el país de origen...'] // Opcional: añade un placeholder
) ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
