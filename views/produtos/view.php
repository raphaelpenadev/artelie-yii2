<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Produtos $model */

$this->title = $model->idproduto;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idproduto' => $model->idproduto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idproduto' => $model->idproduto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'idproduto',
            'descricao',
            'tipo',
            [
                'attribute' => 'valor_unitario',
                'value' => function ($model) {
                    return number_format($model->valor_unitario, 2, ',', '.');
                }
            ],
            'quantidade',
            [
                'label' => 'Valor Total',
                'value' => function ($model) {
                    $valorTotal = $model->valor_unitario * $model->quantidade;
                    return $valorTotal;
                }
            ]
        ],
    ]) ?>

</div>