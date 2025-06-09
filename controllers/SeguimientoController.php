<?php

namespace app\controllers;

use Yii;
use app\models\seguimiento;
use app\models\SeguimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pacientes;

/**
 * SeguimientoController implements the CRUD actions for seguimiento model.
 */
class SeguimientoController extends Controller
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
     * Lists all seguimiento models.
     *
     * @return string
     */
   public function actionIndex()
{
    $searchModel = new SeguimientoSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    // Obtener el primer modelo del dataProvider
    $models = $dataProvider->getModels();
    $model = $models[0] ?? null;  // null si no hay resultados

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'model' => $model,
    ]);
}


    /**
     * Displays a single seguimiento model.
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
     * Creates a new seguimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
        {
            $model = new seguimiento();

            // Captura los valores directamente de GET
            $model->id_pacientes = Yii::$app->request->get('id_pacientes');
            $model->pacientereporte_id = Yii::$app->request->get('pacientereporte_id');
             // Asigna el ID del usuario autenticado al campo 'pertenece'
            $model->pertenece = Yii::$app->user->id;
           

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
               // return $this->redirect(['view', 'id' => $model->id]);
                $id_pacientes = Yii::$app->request->get('id_pacientes');
                $pacientereporte_id = Yii::$app->request->get('pacientereporte_id');

                return $this->redirect([
                    'seguimiento/index',
                    'SeguimientoSearch[id_pacientes]' => $id_pacientes,
                    'SeguimientoSearch[pacientereporte_id]' => $pacientereporte_id,
                ]);
            }

            return $this->render('create', [
                'model' => $model,
                
            ]);
        }



    /**
     * Updates an existing seguimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pacientes = Pacientes::find()->select(['nombre']) // Ajusta el campo
            ->indexBy('id')
            ->column();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Deletes an existing seguimiento model.
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
     * Finds the seguimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return seguimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = seguimiento::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
