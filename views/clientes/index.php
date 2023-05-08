<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;

Icon::map($this);

/** @var yii\web\View $this */
/** @var app\models\search\ClientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Icon::show('globe') . Html::encode($this->title) ?></h1>

    <p>
        <?php Modal::begin([
            'title' => '<h4>Novo Cliente</h4>',
            'toggleButton' => ['label' => 'Novo Cliente', 'class' => 'btn btn-success'],
        ]);

        echo $this->render('_form', ['model' => $model]);

        Modal::end(); ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php Pjax::begin(['id' => 'clientes']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'idcliente',
            [
                'attribute' => 'nome',
                'label' => 'Cliente',
                'value' => function ($model) {
                    return $model->nome;
                }
            ],
            'descricao',
            'contato:ntext',
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
    ]);
    Pjax::end() ?>


</div>