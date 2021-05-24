<?php

namespace app\modules\lessonsSchedule\models\db;

use Yii;

/**
 * This is the model class for table "asu_benefits".
 *
 * @property int $id
 * @property string|null $name
 */
class NvAuditory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_audience_base';
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
            [['title'], 'string', 'max' => 45],
            [['title','case_number','count_seats_max','count_seats_min'],'required'],
            [['title','case_number','count_seats_max','count_seats_min','description'],'safe']
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

    public static function info($id){
        return self::find()->where(['id'=>$id])->one();
    }

}
