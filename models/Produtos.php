<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $idproduto
 * @property string $descricao
 * @property string $tipo
 * @property float|null $valor_unitario
 * @property int|null $quantidade
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'tipo'], 'required'],
            [['valor_unitario'], 'number'],
            [['quantidade'], 'integer'],
            [['descricao', 'tipo'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproduto' => 'Idproduto',
            'descricao' => 'Descricao',
            'tipo' => 'Tipo',
            'valor_unitario' => 'Valor Unitario',
            'quantidade' => 'Quantidade',
        ];
    }
}
