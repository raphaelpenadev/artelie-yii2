<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idcliente
 * @property int $idencomenda
 * @property string $nome
 * @property string|null $descricao
 *
 * @property Encomendas[] $encomendas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome', 'descricao'], 'string', 'max' => 300],
            [['idencomenda'], 'exist', 'skipOnError' => true, 'targetClass' => Encomendas::class, 'targetAttribute' => ['idencomenda' => 'idencomenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcliente' => 'Idcliente',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomendas::class, ['idcliente' => 'idcliente']);
    }
}
