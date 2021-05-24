<?php

namespace app\modules\lessonsSchedule\controllers;

use app\models\User;
use app\modules\education\models\AsuGrupa;
use app\modules\education\models\AsuPredmet;
use app\modules\lessonsSchedule\models\db\NvAuditory;
use app\modules\lessonsSchedule\models\db\NvTeacherHoursLoad;
use app\modules\lessonsSchedule\models\db\NvTypeOccupation;
use app\modules\lessonsSchedule\models\TimetableClassesModel;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PredmetListController implements the CRUD actions for AsuPredmet model.
 */
class BodyController extends Controller
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
        $arrPara[1] = '08:30-09:50';
        $arrPara[2] = '10:00-11:20';
        $arrPara[3] = '11:30-12:50';
        $arrPara[4] = '13:10-14:30';
        $arrPara[5] = '14:40-16:00';
        $arrPara[6] = '16:10-17:30';
        $arrPara[7] = '17:40-19:00';
        $arrPara[8] = '19:05-20:25';
        $arrPara[9] = '20:30-21:40';
        $grupa_id = 0;

        if(isset($_GET['grupa_id'])){
            $grupa_id = $_GET['grupa_id'];
        }

        if($grupa_id){
            return $this->render('index', [
                'arrPara' => $arrPara,
                'listLessonShedule' => TimetableClassesModel::getLeessonSchedule($grupa_id),
                'grupa_id' => $grupa_id,
            ]);
        }else{
            return $this->render('list_grupa', [
                'arrGrupa' => ArrayHelper::map(AsuGrupa::find()->all(), 'id','name')
            ]);
        }


    }
    public function actionSelectLoadHoursAjax()
    {
        $grupa_id = $_POST['grupa_id'];
        $row_id = $_POST['row_id'];
        $para = $_POST['para'];
        $weekly = $_POST['weekly'];
        $day = $_POST['day'];
        


        $row = NvTeacherHoursLoad::find()->where(['grupa_id'=>$grupa_id])->all();
        return $this->renderPartial('_list_hours_load', [
            'row'=>$row,
            'row_id'=>$row_id,
            'day'=>$day,
            'grupa_id'=>$grupa_id,
            'para'=>$para,
            'weekly'=>$weekly
            ]);
    }
    
    public function actionAddParaAjax()
    {
        $predmet_id = $_POST['predmet_id'];
        $teacher_id = $_POST['teacher_id'];
        $para = $_POST['para'];
        $day = $_POST['day'];
        $weekly = $_POST['weekly'];
        $grupa_id = $_POST['grupa_id'];
        $row_id = $_POST['row_id'];
        $occupation_type_id = $_POST['occupation_type_id'];



        $arrAud = TimetableClassesModel::searchFreeAudience($para,$day,$weekly);
        return $this->renderPartial('_row', compact('occupation_type_id','row_id','arrAud','predmet_id','teacher_id','para','day','weekly','grupa_id'));
    }

    public function actionInsertRowParaAjax()
    {
        /**
         * показуємо навчальному запис в планшеті і пишемо пару в базу
         */
        $predmet_id = $_POST['predmet_id'];
        $teacher_id = $_POST['teacher_id'];
        $para = $_POST['para'];
        $day = $_POST['day'];
        $weekly = $_POST['weekly'];
        $grupa_id = $_POST['grupa_id'];
        $aud_id = $_POST['aud_id'];
        $occupation_type_id = $_POST['occupation_type_id'];

        $res = TimetableClassesModel::addLesson($predmet_id,$teacher_id,$para,$day,$weekly,$grupa_id,$aud_id,$occupation_type_id);

        $userInfo = User::userInfo($teacher_id);
        $audInfo = NvAuditory::info($aud_id);
        $predmetInfo = AsuPredmet::info($predmet_id);
        $typeOccupationInfo = NvTypeOccupation::info($occupation_type_id); 
        return $this->renderPartial('_row_insert', compact('typeOccupationInfo','predmetInfo','audInfo','userInfo','aud_id','predmet_id','teacher_id','para','day','weekly','grupa_id'));
    }
}
