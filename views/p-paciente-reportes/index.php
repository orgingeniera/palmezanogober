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

           [
                'attribute' => 'id',
                'value' => function ($model) {
                    return $model->paciente ? $model->paciente->identificacion : '(no asignado)';
                },
                'label' => 'Identificación',
            ],
            [
                'attribute' => 'paciente_id',
                'value' => function ($model) {
                    return $model->paciente ? $model->paciente->nombre : null;
                },
                'label' => 'Paciente',
            ],

            'fecha_reporte',
            'fecha_ingreso',
            'fecha_notificacion_sivigila',
             [
                'attribute' => 'pertenece',
                'label' => 'Atendido por',
                'value' => function ($model) {
                    return $model->usuario ? $model->usuario->empresa : '(no asignado)';
                },
            ],
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
                'template' => '{view} {update} {delete} {seguimiento}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        if ((int)trim($model->pertenece) === (int)Yii::$app->user->id) {
                            return Html::a(
                                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"></path></svg>',
                                $url,
                                ['title' => 'Ver']
                            );
                        }
                        return ''; // Ocultar si no pertenece
                    },
                    'update' => function ($url, $model, $key) {
                        if ((int)trim($model->pertenece) === (int)Yii::$app->user->id) {
                            return Html::a(
                                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>',
                                $url,
                                ['title' => 'Actualizar']
                            );
                        }
                        return ''; // Ocultar si no pertenece
                    },
                    'delete' => function ($url, $model, $key) {
                        if ((int)trim($model->pertenece) === (int)Yii::$app->user->id) {
                           
                            return Html::a(
                                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>',
                                $url,
                                [
                                    'title' => 'Eliminar',
                                    'data-confirm' => '¿Estás seguro de eliminar este elemento?',
                                    'data-method' => 'post',
                                ]
                            );
                        }
                        return ''; // Ocultar si no pertenece
                    },
                    'seguimiento' => function ($url, $model, $key) {
                        return Html::a(
                            'Seguimiento',
                            [
                                'seguimiento/index',
                                'SeguimientoSearch[id_pacientes]' => $model->paciente_id,
                                'SeguimientoSearch[pacientereporte_id]' => $model->id,
                            ],
                            ['title' => 'Seguimiento']
                        );
                    },
                ],
                'urlCreator' => function ($action, PacienteReportes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],

        ],
    ]); ?>


</div>
