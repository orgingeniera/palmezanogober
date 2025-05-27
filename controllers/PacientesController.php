<?php

namespace app\controllers;

use Yii;
use app\models\Pacientes;
use app\models\PacientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/**
 * PacientesController implements the CRUD actions for Pacientes model.
 */
class PacientesController extends Controller
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
     * Lists all Pacientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PacientesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
public function actionExportExcel()
{
    $userId = Yii::$app->user->id;
    $user = \app\models\User::findOne($userId);

    if (!$user) {
        throw new \yii\web\ForbiddenHttpException('Usuario no autenticado.');
    }

    if ($user->role === 'administrador') {
        // Si es admin, trae todos los pacientes
        $pacientes = \app\models\Pacientes::find()->all();
    } else {
        // Si no es admin, solo trae los pacientes que le pertenecen
        $pacientes = \app\models\Pacientes::find()->where(['pertenece' => $userId])->all();
    }

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Encabezados
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nombre');
    $sheet->setCellValue('C1', 'Tipo Identificación');
    $sheet->setCellValue('D1', 'Identificación');
    $sheet->setCellValue('E1', 'Edad');

    $row = 2;
    foreach ($pacientes as $p) {
        $sheet->setCellValue('A' . $row, $p->id);
        $sheet->setCellValue('B' . $row, $p->nombre);
        $sheet->setCellValue('C' . $row, $p->tipo_identificacion);
        $sheet->setCellValue('D' . $row, $p->identificacion);
        $sheet->setCellValue('E' . $row, $p->edad);
        $row++;
    }

    $filename = 'pacientes_export_' . date('Ymd_His') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment;filename=\"$filename\"");
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}



    /**
     * Displays a single Pacientes model.
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
     * Creates a new Pacientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pacientes();

            if ($this->request->isPost) {
                    if ($model->load($this->request->post())) {
                $model->pertenece = (string)Yii::$app->user->id; // ✅ después del load()
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                    exit;
                }
             }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pacientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pacientes model.
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
     * Finds the Pacientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pacientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pacientes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
