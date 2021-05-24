<?php

namespace app\modules\lessonsSchedule\controllers;

use Yii;
use app\modules\education\models\AsuPredmet;
use app\modules\lessonsSchedule\models\db\NvKafedra;
use app\modules\lessonsSchedule\models\db\NvKafedraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\modules\lessonsSchedule\models\NvKafedraTeacher;
use yii\helpers\ArrayHelper;

/**
 * PredmetListController implements the CRUD actions for AsuPredmet model.
 */
class KafedraBaseController extends Controller
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
        $searchModel = new NvKafedraSearch();
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
        $model = new NvKafedra();
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            if ($model->load($post) and $model->save()) {
                $id = $model->id;
                if(isset($post['list_teacher'])){
                    foreach($post['list_teacher'] as $teacher_id){
                        $o = new NvKafedraTeacher();
                        $o->kafedra_id = $model->id;
                        $o->teacher_id = $teacher_id;
                        $o->save(false);
                    }
                }
                if(isset($post['manager_teacher_id'])){
                    NvKafedra::updateAll(['manager_teacher_id'=>$post['manager_teacher_id']],['id'=>$id]);
                }
                    Yii::$app->session->setFlash('success', "Кафедру додано");
                    return $this->redirect(['view', 'id' => $id]);
                }
        }

        return $this->render('create', [
            'model' => $model,
            'manager_teacher_id' => '',
            'list_teacher' => User::findOnlyTeacher(),
            'list_teacher_default' => []
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
                if(isset($post['list_teacher'])){
                    NvKafedraTeacher::deleteAll(['kafedra_id'=>$id]);
                    foreach($post['list_teacher'] as $teacher_id){
                        $o = new NvKafedraTeacher();
                        $o->kafedra_id = $_GET['id'];
                        $o->teacher_id = $teacher_id;
                        $o->save(false);
                    }
                }
                if(isset($post['manager_teacher_id'])){
                    NvKafedra::updateAll(['manager_teacher_id'=>$post['manager_teacher_id']],['id'=>$id]);
                }
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Відредаговано");
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'manager_teacher_id' => $model->manager_teacher_id,
            'list_teacher' => User::findOnlyTeacher(),
            'list_teacher_default' => ArrayHelper::map(NvKafedraTeacher::find()->where(['kafedra_id'=>$id])->all(), 'id','teacher_id')
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
        if (($model = NvKafedra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
