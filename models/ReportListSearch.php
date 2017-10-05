<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportList;

/**
 * ReportListSearch represents the model behind the search form about `app\models\ReportList`.
 */
class ReportListSearch extends ReportList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_report_list', 'client_id', 'report_id'], 'integer'],
            [['client_login', 'report_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = ReportList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_report_list' => $this->id_report_list,
            'client_id' => $this->client_id,
            'report_id' => $this->report_id,
        ]);

        $query->andFilterWhere(['like', 'client_login', $this->client_login])
            ->andFilterWhere(['like', 'report_name', $this->report_name]);

        return $dataProvider;
    }
}
