<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\grid\GridView;
use app\models\Clientes;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var app\models\search\ClientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo - Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => 'yii\bootstrap5\LinkPager',
            'options' => ['class' => 'pagination justify-content-center']
        ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'idcliente',
            'nome',
            [
                'label' => 'Descrição',
                'attribute' => 'descricao',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="d-flex justify-content-around">{view}{update}{delete}</div>',
                'contentOptions' => [
                    'class' => 'col-xs-1',
                ],
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a(Icon::show('eye', ['framework' => Icon::FAL]), $url, [
                            'title' => 'Visualizar',
                            'class' => 'text-success mr-1'
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a(Icon::show('sync', ['framework' => Icon::FAL]), $url, [
                            'title' => 'Atualizar',
                            'class' => 'text-success mr-1'
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a(Icon::show('trash', ['framework' => Icon::FAL]), $url, [
                            'title' => 'Deletar',
                            'class' => 'text-success mr-1',
                            'data-confirm' => 'Você tem certeza que deseja excluir o registro?',
                            'data-method' => 'POST'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>