<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>

<style>
    .login-container {
        max-width: 420px;
        margin: 100px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
        font-family: 'Poppins', sans-serif;
    }

    .login-container h1 {
        text-align: center;
        color: #0A4D68;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
    }

    .btn-login {
        background-color: #0A4D68;
        color: white;
        border-radius: 10px;
        padding: 12px;
        font-weight: bold;
        width: 100%;
        transition: background 0.3s;
    }

    .btn-login:hover {
        background-color: #28C3B5;
        color: #fff;
    }

    .custom-control {
        margin-bottom: 15px;
    }

    .login-footer {
        text-align: center;
        color: #888;
        margin-top: 25px;
        font-size: 14px;
    }

    .invalid-feedback {
        font-size: 13px;
        color: #dc3545;
    }
</style>

<div class="login-container">
   <center  >
      <div style="display: flex; justify-content: center; margin-top: -30px;">
        <?= \yii\helpers\Html::img('@web/img/logogenesys.jpeg', [
            'alt' => 'Logo GENESYS',
            'style' => 'max-width: 250px; height: auto;'
        ]) ?>
    </div>
    </center>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'form-label mt-2'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Nombre de usuario']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña']) ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"custom-control custom-checkbox mb-3\">{input} {label}</div>\n{error}",
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-login', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    
</div>
