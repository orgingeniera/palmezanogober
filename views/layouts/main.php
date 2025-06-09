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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primario: #0A4D68;
            --secundario: #28C3B5;
            --fondo: #f4f7fa;
            --texto: #212529;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--fondo);
            color: var(--texto);
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: var(--primario);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 25px;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar .title {
            font-size: 20px;
            font-weight: 600;
        }

        .navbar .user-info {
            font-size: 14px;
        }

        .navbar .logout-form {
            display: inline;
        }

        .navbar .logout-btn {
            background: none;
            border: none;
            color: white;
            font-weight: bold;
            margin-left: 15px;
            cursor: pointer;
        }

        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 240px;
            background-color: var(--primario);
            min-height: calc(100vh - 60px);
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--secundario);
        }

        .sidebar a,
        .sidebar form {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar form:hover,
        .sidebar .logout:hover {
            background-color: #126a87;
        }

        .main-content {
            margin-left: 240px;
            margin-top: 60px;
            padding: 30px;
        }

        .main-content h1, .main-content h2, .main-content h3 {
            color: var(--primario);
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin: 60px 0 0 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php
     $rolPermitido = ['administrador', 'ipsdeUrgencias']; // Ajusta según tus roles válidos
    ?>
<?php $this->beginBody() ?>

<!-- Menú horizontal superior -->
<div class="navbar">
    <div class="title" style="display: flex; align-items: center; gap: 10px;">
        <span style="font-size: 24px; font-weight: bold;">GENESYS Colombia</span>
        <?= \yii\helpers\Html::img('@web/img/logo.png', [
            'alt' => 'Logo GENESYS',
            'style' => 'max-width: 100px; height: auto;'
        ]) ?>
    </div>

    <div class="user-info">
        <?php if (Yii::$app->user->isGuest): ?>
            <a href="<?= \yii\helpers\Url::to(['/site/login']) ?>" style="color: white;">Login</a>
        <?php else: ?>
            <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form']) ?>
                <?= Html::encode(Yii::$app->user->identity->username) ?>
                <button type="submit" class="logout-btn">Logout</button>
            <?= Html::endForm() ?>
        <?php endif; ?>
    </div>
</div>

<!-- Menú lateral -->
<div class="sidebar">
    
    <h4>Menú</h4>
     <?php if (!Yii::$app->user->isGuest && in_array(Yii::$app->user->identity->role, $rolPermitido)): ?>
    <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Inicio</a>
    <?php endif; ?>
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'administrador'): ?>
        <a href="<?= \yii\helpers\Url::to(['user/index']) ?>">Usuarios</a>
    <?php endif; ?>
   <?php if (!Yii::$app->user->isGuest && in_array(Yii::$app->user->identity->role, $rolPermitido)): ?>
    <a href="<?= \yii\helpers\Url::to(['pacientes/index']) ?>">Pacientes</a>
    <a href="<?= \yii\helpers\Url::to(['p-paciente-reportes/index']) ?>">Reporte Pacientes</a>
     <?php endif; ?>
</div>

<!-- Contenido principal -->
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
