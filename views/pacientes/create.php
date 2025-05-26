<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pacientes $model */

$this->title = 'Create Pacientes';
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
