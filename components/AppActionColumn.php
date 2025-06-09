<?php
namespace app\components;

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use Yii;

class AppActionColumn extends ActionColumn
{
    public $showSeguimiento = false;

    public function init()
    {
        $this->template = '{view} {update} {delete}' . ($this->showSeguimiento ? ' {seguimiento}' : '');

        $this->buttons = [
            
            'update' => function ($url, $model, $key) {
                if ((int)trim($model->pertenece) === (int)Yii::$app->user->id) {
                    return Html::a(
                        '<svg aria-hidden="true" style="width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0z"/></svg>',
                        $url,
                        ['title' => 'Actualizar']
                    );
                }
                return '';
            },
            'delete' => function ($url, $model, $key) {
                if ((int)trim($model->pertenece) === (int)Yii::$app->user->id) {
                    return Html::a(
                        '<svg aria-hidden="true" style="width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg>',
                        $url,
                        [
                            'title' => 'Eliminar',
                            'data-confirm' => '¿Estás seguro de eliminar este elemento?',
                            'data-method' => 'post',
                        ]
                    );
                }
                return '';
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
        ];

        // URL creator genérico
        $this->urlCreator = function ($action, $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
        };

        parent::init();
    }
}
