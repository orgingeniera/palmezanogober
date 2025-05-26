<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportes $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paciente Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paciente-reportes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'paciente_id',
            'fecha_reporte',
            'fecha_ingreso',
            'fecha_notificacion_sivigila',
            'ips_urgencia',
            'pertenencia_etnica',
            'eps',
            'diagnostico:ntext',
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
            'responsable_reporte',
            'telefono_reporta',
            'observaciones:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
