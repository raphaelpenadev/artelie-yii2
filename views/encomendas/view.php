<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */

$this->title = $model->idencomenda;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="encomendas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idencomenda' => $model->idencomenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idencomenda' => $model->idencomenda], [
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

            [
                'attribute' => 'idcliente',
                'value' => function ($model) {
                    return $model->idcliente0->nome;
                }
            ],
            'descricao',
            [
                'attribute' => 'valor',
                'value' => function ($model) {
                    return number_format($model->valor, 2, ',', '.');
                }
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'value' => function ($model) {
                    switch ($model->status) {
                        case 'P':
                            return 'Pendente';
                            break;
                        case 'A':
                            return 'Aceito';
                            break;
                        case 'F':
                            return 'Finalizado';
                            break;
                    }
                }
            ],
        ],
    ]) ?>

</div>