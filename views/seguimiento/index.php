<?php

use app\models\seguimiento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var app\models\seguimiento $model */
/** @var yii\web\View $this */
/** @var app\models\SeguimientoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Seguimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
            $id_pacientes = Yii::$app->request->get('SeguimientoSearch')['id_pacientes'] ?? null;
            $pacientereporte_id = Yii::$app->request->get('SeguimientoSearch')['pacientereporte_id'] ?? null;
        ?>
         <?php if ((int)trim($model->pertenece) === (int)Yii::$app->user->id): ?>
            <?= Html::a(
                'Crear Seguimiento',
                ['seguimiento/create', 'id_pacientes' => $id_pacientes, 'pacientereporte_id' => $pacientereporte_id],
                ['class' => 'btn btn-success']
            ) ?>
         <?php endif; ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'evolucion_seguimiento:ntext',
            'escala_alerta_temprana',
            'teleapoyo_hosp_padrino',
            'hospital_padrino',
             [
                'attribute' => 'pertenece',
                'label' => 'Atendido por',
                'value' => function ($model) {
                    return $model->usuario ? $model->usuario->empresa : '(no asignado)';
                },
            ],
            //'respuesta_hosp_padrino',
            //'requiere_remision',
            //'hora_remision',
            //'entidad_remitida',
            //'fecha_egreso',
            //'motivo_egreso',
            //'observaciones:ntext',
            //'id_pacientes',
            [
                'class' => \app\components\AppActionColumn::class,
                'showSeguimiento' => false,
            ],
        ],
    ]); ?>


</div>
