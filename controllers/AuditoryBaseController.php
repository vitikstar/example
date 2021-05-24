<?php

namespace app\modules\lessonsSchedule\controllers;

use Yii;
use app\modules\education\models\AsuPredmet;
use app\modules\lessonsSchedule\models\db\NvAuditory;
use app\modules\lessonsSchedule\models\db\NvAuditorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PredmetListController implements the CRUD actions for AsuPredmet model.
 */
class AuditoryBaseController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all AsuPredmet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NvAuditorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AsuPredmet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $model = new NvAuditory();
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            if ($model->load($post) and $model->save()) {
                    $id = $model->id;
                    Yii::$app->session->setFlash('success', "Аудиторію додано");
                    return $this->redirect(['view', 'id' => $id]);
                }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing AsuPredmet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if ($post) {
            if ($model->load($post)) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Відредаговано");
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing AsuPredmet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {

        return $this->redirect(['view', 'id' => $id]);
    }
    /**
     * Finds the AsuPredmet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AsuPredmet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NvAuditory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
