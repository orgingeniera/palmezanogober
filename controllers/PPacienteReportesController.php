<?php

namespace app\controllers;

use Yii;
use app\models\PacienteReportes;
use app\models\Pacientes; // ¡Importa el modelo Pacientes!
use yii\helpers\ArrayHelper; // Importa ArrayHelper para formatear la lista
use app\models\PacienteReportesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PPacienteReportesController implements the CRUD actions for PacienteReportes model.
 */
class PPacienteReportesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all PacienteReportes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PacienteReportesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PacienteReportes model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PacienteReportes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    $model = new PacienteReportes();

    // Obtener los pacientes para el dropdown
    $pacientes = Pacientes::find()->orderBy('nombre')->all();
    $items = ArrayHelper::map($pacientes, 'id', 'nombre');

    if ($this->request->isPost) {
        if ($model->load($this->request->post())) {
            // Asignar el id del usuario logueado al campo pertenece
            $model->pertenece = (string)Yii::$app->user->id;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // Mostrar errores si falla la validación o guardado
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
            }
        } else {
            // Si no carga bien el modelo (improbable), volver a renderizar
            return $this->render('create', [
                'model' => $model,
                'items' => $items,
            ]);
        }
    } else {
        $model->loadDefaultValues();
    }

    return $this->render('create', [
        'model' => $model,
        'items' => $items,
    ]);
}


    /**
     * Updates an existing PacienteReportes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // --- Start: Ensure $items is defined for update as well ---
        $pacientes = Pacientes::find()->orderBy('nombre')->all();
        $items = ArrayHelper::map($pacientes, 'id', 'nombre');
        // --- End: Ensure $items is defined for update as well ---

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'items' => $items, // <--- IMPORTANT: Pass $items here
        ]);
    }
 
    /**
     * Deletes an existing PacienteReportes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PacienteReportes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PacienteReportes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PacienteReportes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
