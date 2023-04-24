<?php

use app\models\Encomendas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\EncomendasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Encomendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Encomendas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idencomenda',
            'idcliente',
            'descricao',
            'valor',
            'status',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Encomendas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idencomenda' => $model->idencomenda]);
                }
            ],
        ],
    ]); ?>


</div>