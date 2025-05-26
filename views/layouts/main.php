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
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="sidebar">
    <h4 style="text-align:center;">Mi Sistema</h4>
    <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Inicio</a>
    <a href="<?= \yii\helpers\Url::to(['user/index']) ?>">Usuarios</a>
    <a href="<?= \yii\helpers\Url::to(['pacientes/index']) ?>">Pacientes</a>
    <a href="<?= \yii\helpers\Url::to(['p-paciente-reportes/index']) ?>">Reporte Pacientes</a>
    <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Contacto</a>

    <!-- Login / Logout -->
    <?php if (Yii::$app->user->isGuest): ?>
        <a href="<?= \yii\helpers\Url::to(['/site/login']) ?>">Login</a>
    <?php else: ?>
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
