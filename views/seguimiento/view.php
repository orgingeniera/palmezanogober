<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\seguimiento $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Seguimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="seguimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ((int)trim($model->pertenece) === (int)Yii::$app->user->id): ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label' => 'Nombre Paciente',
            'value' => function($model) {
                return $model->pacientes ? $model->pacientes->nombre : 'No asignado';
            }
        ],
        // Mostrar identificación del paciente desde la relación
        [
            'label' => 'Identificación Paciente',
            'value' => function($model) {
                return $model->pacientes ? $model->pacientes->identificacion : 'No asignado';
            }
        ],
            'evolucion_seguimiento:ntext',
            'escala_alerta_temprana',
            'teleapoyo_hosp_padrino',
            'hospital_padrino',
            'respuesta_hosp_padrino',
            'requiere_remision',
            'hora_remision',
            'entidad_remitida',
            'fecha_egreso',
            'motivo_egreso',
            'observaciones:ntext',
           
            
        ],
    ]) ?>

</div>
