<?php

namespace app\modules\lessonsSchedule\models\db;

use Yii;

/**
 * This is the model class for table "asu_benefits".
 *
 * @property int $id
 * @property string|null $name
 */
class NvAudienceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_audience_type';
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
