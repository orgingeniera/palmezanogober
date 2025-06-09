<?php

namespace app\controllers;
use Yii;
use app\models\PacienteReportes;
use app\models\PacienteReportesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pacientes;

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
           $pacientes = \app\models\Pacientes::find()->all();

            $pacientes = \yii\helpers\ArrayHelper::map(
                $pacientes,
                'id',
                function ($paciente) {
                    return $paciente->identificacion . ' - ' . $paciente->nombre;
                }
            );

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->pertenece = (string)Yii::$app->user->id;
                 if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }else {
                   Yii::$app->session->setFlash('error', 'El paciente ya existe o hay errores al guardar.');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'pacientes' => $pacientes,
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

            // Obtener lista de pacientes para usar en el select o lo que sea necesario en la vista
            $pacientes = \app\models\Pacientes::find()->all();
            $pacientes = \yii\helpers\ArrayHelper::map(
                $pacientes,
                'id',
                function ($paciente) {
                    return $paciente->identificacion . ' - ' . $paciente->nombre;
                }
            );

            if ($model->load($this->request->post())) {
                $model->pertenece = (string)Yii::$app->user->id;
                if ($model->save()) {
                // Guardado exitoso
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // Mostrar errores del modelo
                Yii::error($model->errors, 'modelo');
                echo '<pre>';
                print_r($model->errors);
                echo '</pre>';
                exit;
            }
            }

            return $this->render('update', [
                'model' => $model,
                'pacientes' => $pacientes,  // <-- aquí pasamos la variable a la vista
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
