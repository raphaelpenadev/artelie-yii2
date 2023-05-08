<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */

$this->title = 'Atualizar Encomenda: ' . $model->idcliente0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcliente0->nome, 'url' => ['view', 'id' => $model->idencomenda]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="encomendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>