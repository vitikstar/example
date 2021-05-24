<?php

namespace app\modules\lessonsSchedule\models\db;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

class NvTeacherHoursLoadSearch extends NvTeacherHoursLoad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['teacher_id','grupa_id','predmet_id','type_aud_id','hours','start_date','end_date','type_lesson_id'],'safe'],
        ];
    }
    public static function getDb()
    {
        return Yii::$app->get('db_s');
    }
    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NvTeacherHoursLoad::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'teacher_id' => $this->teacher_id,
            'grupa_id' => $this->grupa_id,
            'predmet_id' => $this->predmet_id,
            'type_aud_id' => $this->type_aud_id,
            'hours' => $this->hours,
            'type_lesson_id' => $this->type_lesson_id
        ]);

        

        return $dataProvider;
    }
}
