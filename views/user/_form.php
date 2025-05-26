<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'empresa')->textInput(['maxlength' => true]) ?>
   <?= $form->field($model, 'role')->dropDownList(
    [
        'administrador' => 'Administrador',
        'gestor' => 'Gestor',
    ],
    ['prompt' => 'Selecciona un rol'] // Opción para mostrar un texto inicial
) ?>
    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true, 'value' => '']) ?>

  
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>