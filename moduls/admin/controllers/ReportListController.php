<?php

namespace app\moduls\admin\controllers;

use Yii;
use app\models\ReportList;
use app\models\ReportListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReportListController implements the CRUD actions for ReportList model.
 */
class ReportListController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ReportList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReportList model.
     * @param string $id_report_list
     * @param string $client_id
     * @param string $report_id
     * @return mixed
     */
    public function actionView($id_report_list, $client_id, $report_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_report_list, $client_id, $report_id),
        ]);
    }

    /**
     * Creates a new ReportList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReportList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_report_list' => $model->id_report_list, 'client_id' => $model->client_id, 'report_id' => $model->report_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ReportList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_report_list
     * @param string $client_id
     * @param string $report_id
     * @return mixed
     */
    public function actionUpdate($id_report_list, $client_id, $report_id)
    {
        $model = $this->findModel($id_report_list, $client_id, $report_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_report_list' => $model->id_report_list, 'client_id' => $model->client_id, 'report_id' => $model->report_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ReportList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_report_list
     * @param string $client_id
     * @param string $report_id
     * @return mixed
     */
    public function actionDelete($id_report_list, $client_id, $report_id)
    {
        $this->findModel($id_report_list, $client_id, $report_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReportList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_report_list
     * @param string $client_id
     * @param string $report_id
     * @return ReportList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_report_list, $client_id, $report_id)
    {
        if (($model = ReportList::findOne(['id_report_list' => $id_report_list, 'client_id' => $client_id, 'report_id' => $report_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
