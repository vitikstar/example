<?php

namespace app\modules\lessonsSchedule\models\db;

use Yii;

/**
 * This is the model class for table "asu_benefits".
 *
 * @property int $id
 * @property string|null $name
 */
class NvKafedraTeacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_kafedra_teacher';
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
            [['teacher_id','kafedra_id'],'required'],
            [['teacher_id','kafedra_id'],'safe']
        ];
    }


}
