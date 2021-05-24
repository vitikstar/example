<?php

namespace app\modules\lessonsSchedule\models\db;

use Yii;

/**
 * This is the model class for table "asu_benefits".
 *
 * @property int $id
 * @property string|null $name
 */
class NvTypeOccupation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_type_occupation';
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
            [['title'],'required'],
            [['title'],'safe']
        ];
    }

    public static function info($id){
        return self::find()->where(['id'=>$id])->one();
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title'=>'Назва'
        ];
    }

}
