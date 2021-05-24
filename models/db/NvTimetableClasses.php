<?php

namespace app\modules\lessonsSchedule\models\db;

use app\models\User;
use app\modules\education\models\AsuGrupa;
use app\modules\education\models\AsuPredmet;
use Yii;

/**
 * This is the model class for table "asu_benefits".
 *
 * @property int $id
 * @property string|null $name
 */
class NvTimetableClasses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_timetable_classes';
    }
    public static function getDb()
    {
        return Yii::$app->get('db_s');
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id','grupa_id','predmet_id','aud_id','type_lesson_id','day','weekly','para'],'required'],
        ];
        }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id'=>'Викладач',
            'grupa_id'=>'Група',
            'weekly'=>'Тиждень',
            'predmet_id'=>'Предмет',
            'aud_id'=>'Аудиторія',
            'type_lesson_id'=>'Тип уроку',
            'day'=>'День'
        ];
    }

    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }

    
    public function getGrupa()
    {
        return $this->hasOne(AsuGrupa::className(), ['id' => 'grupa_id']);
    }
    
    public function getPredmet()
    {
        return $this->hasOne(AsuPredmet::className(), ['id' => 'predmet_id']);
    }    
    public function getAud()
    {
        return $this->hasOne(NvAuditory::className(), ['id' => 'aud_id']);
    }
    
    public function getTypeLesson()
    {
        return $this->hasOne(NvTypeOccupation::className(), ['id' => 'type_lesson_id']);
    }

}
