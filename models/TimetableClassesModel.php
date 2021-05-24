<?php

namespace app\modules\lessonsSchedule\models;

use app\modules\education\models\AsuGrupa;
use app\modules\lessonsSchedule\models\db\NvAuditory;
use app\modules\lessonsSchedule\models\db\NvTimetableClasses;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class TimetableClassesModel extends Model
{

    public  static function searchFreeAudience($para,$day,$weekly){
        $arrAud = [];
        foreach(array_diff(ArrayHelper::map(NvAuditory::find()->all(), 'id','id'),ArrayHelper::map(NvTimetableClasses::find()->all(), 'aud_id','aud_id')) as $item){
            $obj = NvAuditory::find()->where(['id'=>$item])->one();
            $arrAud[$item] = $obj->title;
        }
         return $arrAud;
    }


    public static function getLeessonSchedule($grupa_id){
        $result = [];

        foreach(NvTimetableClasses::find()->where(['grupa_id'=>$grupa_id])->all() as $item){
            $result[$item->weekly][$item->day][$item->para] = array(
                'teacher_name' => $item->teacher->t_name,
                'predmet_name' => $item->predmet->name,
                'aud' => $item->aud->title,
            );
        }
        return $result;
    }

    public  static function addLesson($predmet_id,$teacher_id,$para,$day,$weekly,$grupa_id,$aud_id,$occupation_type_id){

        $attr =             [
            'predmet_id'=>$predmet_id,'teacher_id'=>$teacher_id,'para'=>$para,'day'=>$day,
            'weekly'=>$weekly,'grupa_id'=>$grupa_id,'aud_id'=>$aud_id,'type_lesson_id'=>$occupation_type_id
        ];

        $count = NvTimetableClasses::find()->where($attr)->count();


        if($count>=1){
            $obj = NvTimetableClasses::find()->where($attr)->one();
            return (NvTimetableClasses::updateAll($attr,['id'=>$obj->id])) ? true : false;
        }else{
            $obj = new NvTimetableClasses();

            foreach($attr as $k=>$v){
                $obj->$k = $v;
            }

            $obj->save(false);
        }
    }

}
