<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encomendas".
 *
 * @property int $idencomenda
 * @property int $idcliente
 * @property string|null $descricao
 * @property float|null $valor
 * @property string|null $status
 * @property string|null $dt_entrega 
 *
 * @property Clientes[] $clientes
 * @property Clientes $idcliente0
 */
class Encomendas extends \yii\db\ActiveRecord
{

    public $valorEncomendaStr;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encomendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcliente'], 'required'],
            [['idcliente'], 'integer'],
            [['valor'], 'number'],
            [['status', 'valorEncomendaStr'], 'string'],
            [['dt_entrega'], 'safe'],
            [['descricao'], 'string', 'max' => 300],
            [['idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['idcliente' => 'idcliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idencomenda' => 'Idencomenda',
            'idcliente' => 'Idcliente',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'status' => 'Status',
            'dt_entrega' => 'Entrega',
        ];
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Clientes::class, ['idencomenda' => 'idencomenda']);
    }

    /**
     * Gets query for [[Idcliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdcliente0()
    {
        return $this->hasOne(Clientes::class, ['idcliente' => 'idcliente']);
    }
}
