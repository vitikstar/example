<?php

namespace app\modules\lessonsSchedule\models\db;

use Yii;

/**
 * This is the model class for table "asu_benefits".
 *
 * @property int $id
 * @property string|null $name
 */
class NvKafedra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_kafedra_base';
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
            [['title_s','title'], 'string', 'max' => 45],
            [['title','case_number'],'required'],
            [['title','title_s','case_number','description'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title'=>'Назва кафедри',
            'title_s'=>'Коротка назва кафедри(шифр)',
            'case_number' => 'Номер навчального корпусу',
            'manager_teacher_id' => 'Завідувач',
            'description' => 'Опис'
        ];
    }

}
