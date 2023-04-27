<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use app\models\Encomendas;
use yii\grid\ActionColumn;

Icon::map($this);

/** @var yii\web\View $this */
/** @var app\models\search\EncomendasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Encomendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Modal::begin([
            'title' => '<h4>Nova Encomenda</h4>',
            'toggleButton' => ['label' => 'Nova Encomenda', 'class' => 'btn btn-success'],
        ]);

        echo $this->render('_form', ['model' => $model]);

        Modal::end(); ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'idencomenda',
            [
                'attribute' => 'clienteNome',
                'label' => 'Cliente',
                'value' => 'idcliente0.nome',
                'filterInputOptions' => [
                    'class' => 'form-control',
                ],
            ],
            [
                'label' => 'Descrição',
                'attribute' => 'descricao',
            ],
            [
                'label' => 'Valor',
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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="d-flex justify-content-around">{update}{delete}</div>',
                'contentOptions' => [
                    'class' => 'col-xs-1',
                ],
                'buttons' => [
                    /*  'view' =>  function ($url, $model) {
                        return Html::a(\kartik\icons\Icon::show('eye'), $url, [
                            'title' => Yii::t('yii', 'View'),
                            'class' => 'text-success mr-1'
                        ]); 
                    },*/
                    'update' =>  function ($url, $model) {
                        return Html::a(\kartik\icons\Icon::show('pencil-alt'), $url, [
                            'title' => Yii::t('yii', 'Update'),
                            'class' => 'text-primary mr-1'
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(\kartik\icons\Icon::show('trash'), $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'text-danger',
                            'data-confirm' => Yii::t('yii', 'Tem certeza que deseja excluir esse registro?'),
                            'data-method' => 'post',
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>