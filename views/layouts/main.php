<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
        body {
            display: flex;
            margin: 0;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            min-height: 100vh;
            color: white;
            padding-top: 20px;
        }
        .sidebar a,
        .sidebar form {
            color: white;
            display: block;
            padding: 10px 15px;
            text-decoration: none;
        }
        .sidebar a:hover,
        .sidebar form:hover {
            background-color: #495057;
        }
        .sidebar form {
            margin: 0;
        }
        .sidebar button.logout {
            background: none;
            border: none;
            padding: 0;
            color: white;
            text-align: left;
            width: 100%;
            padding: 10px 15px;
            cursor: pointer;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        /* --- ESTILOS ACTUALIZADOS PARA EL NOMBRE DE USUARIO --- */
        .sidebar .username-display {
            background-color: #495057; /* Fondo ligeramente diferente */
            color: #ffffff; /* Color de texto blanco */
            font-size: 1.1em; /* Un poco más grande */
            font-weight: bold; /* Negrita */
            text-align: center;
            padding: 12px 15px; /* Más padding para un look más "botón" */
            margin: 10px 15px; /* Márgenes laterales para que no toque los bordes */
            border-radius: 5px; /* Bordes redondeados */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Sutil sombra para profundidad */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Sombra de texto suave */
            letter-spacing: 0.5px; /* Espaciado entre letras */
            transition: background-color 0.3s ease; /* Transición suave al pasar el mouse */
        }
        .sidebar .username-display:hover {
            background-color: #5a6268; /* Color de fondo al pasar el mouse */
            cursor: default; /* Cambiar el cursor para indicar que no es clickeable */
        }
        /* --- FIN ESTILOS ACTUALIZADOS --- */
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="sidebar">
    <h4 style="text-align:center;">Mi Sistema</h4>

    <?php if (Yii::$app->user->isGuest): ?>
        <a href="<?= \yii\helpers\Url::to(['/site/login']) ?>">Login</a>
    <?php else: ?>
        <div class="username-display">
            <?= Html::encode(Yii::$app->user->identity->username) ?>
        </div>
        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Inicio</a>

        <?php
        // Lógica para mostrar/ocultar el menú de Usuarios
        $isAdmin = false;
        $user = Yii::$app->user->identity;
        if ($user && isset($user->role) && $user->role === 'administrador') {
            $isAdmin = true;
        }

        if ($isAdmin):
        ?>
            <a href="<?= \yii\helpers\Url::to(['user/index']) ?>">Usuarios</a>
        <?php endif; ?>

        <a href="<?= \yii\helpers\Url::to(['pacientes/index']) ?>">Pacientes</a>
        <a href="<?= \yii\helpers\Url::to(['p-paciente-reportes/index']) ?>">Reporte Pacientes</a>
      

        <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form']) ?>
            <button type="submit" class="logout">
                Logout (<?= Html::encode(Yii::$app->user->identity->username) ?>)
            </button>
        <?= Html::endForm() ?>
    <?php endif; ?>
</div>

<div class="main-content">
    <?= Breadcrumbs::widget([
        'links' => $this->params['breadcrumbs'] ?? [],
    ]) ?>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>