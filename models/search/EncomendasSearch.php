<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Encomendas;

/**
 * EncomendasSearch represents the model behind the search form of `app\models\Encomendas`.
 */
class EncomendasSearch extends Encomendas
{

    /**
     * @var string
     */
    public $clienteNome;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idencomenda', 'idcliente'], 'integer'],
            [['descricao', 'status', 'clienteNome'], 'safe'],
            [['valor'], 'number'],
        ];
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
        $query = Encomendas::find()
            ->joinWith('idcliente0');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['clienteNome'] = [
            'asc' => ['clientes.nome' => SORT_ASC],
            'desc' => ['clientes.nome' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idencomenda' => $this->idencomenda,
            'idcliente' => $this->idcliente,
            'valor' => $this->valor,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'status', $this->status]);

        $query->andFilterWhere(['like', 'clientes.nome', $this->clienteNome]);

        return $dataProvider;
    }
}
