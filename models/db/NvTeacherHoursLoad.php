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
class NvTeacherHoursLoad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_teacher_hours_load';
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
            [['teacher_id','grupa_id','predmet_id','type_aud_id','hours','start_date','end_date','type_lesson_id'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title'=>'Назва аудиторії',
            'case_number' => 'Номер навчального корпусу',
            'count_seats_max' => 'Максимальна кількість місць',
            'count_seats_min' => 'Мінімальна кількість місць',
            'description' => 'Опис'
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
    public function getTypeAud()
    {
        return $this->hasOne(NvAudienceType::className(), ['id' => 'type_aud_id']);
    }
    
    public function getTypeLesson()
    {
        return $this->hasOne(NvTypeOccupation::className(), ['id' => 'type_lesson_id']);
    }
}
