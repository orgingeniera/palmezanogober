<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\seguimiento $model */

$this->title = 'Create Seguimiento';
$this->params['breadcrumbs'][] = ['label' => 'Seguimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
      
    ]) ?>

</div>
