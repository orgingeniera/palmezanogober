<?php

use app\models\PacienteReportes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PacienteReportesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Paciente Reportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-reportes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paciente Reportes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
          [
            'attribute' => 'Paciente',
            'value' => function($model) {
                return $model->paciente ? $model->paciente->nombre : '(No definido)';
            },
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Pacientes::find()->orderBy('nombre')->all(), 'id', 'nombre'),
         ],
            'fecha_reporte',
            'fecha_ingreso',
            'fecha_notificacion_sivigila',
            //'ips_urgencia',
            //'pertenencia_etnica',
            //'eps',
            //'diagnostico:ntext',
            //'evolucion_seguimiento:ntext',
            //'escala_alerta_temprana',
            //'teleapoyo_hosp_padrino',
            //'hospital_padrino',
            //'respuesta_hosp_padrino',
            //'requiere_remision',
            //'hora_remision',
            //'entidad_remitida',
            //'fecha_egreso',
            //'motivo_egreso',
            //'responsable_reporte',
            //'telefono_reporta',
            //'observaciones:ntext',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PacienteReportes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
