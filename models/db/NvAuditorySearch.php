<?php

namespace app\modules\lessonsSchedule\models\db;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * AsuPredmetSearch represents the model behind the search form of `app\modules\education\models\AsuPredmet`.
 */
class NvAuditorySearch extends NvAuditory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title','case_number','count_seats_max','count_seats_min','description'],'safe']
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
        $query = NvAuditory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->limit(2000)->orderBy(['title' => SORT_ASC]),
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
            'case_number' => $this->case_number,
            'count_seats_max' => $this->count_seats_max,
            'count_seats_min' => $this->count_seats_min
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'description', $this->description]);
        

        return $dataProvider;
    }
}
