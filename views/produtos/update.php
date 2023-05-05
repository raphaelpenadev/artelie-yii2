<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Produtos $model */

$this->title = 'Atualizar Produto: ' . $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Relatório: ' . $model->descricao, 'url' => ['view', 'id' => $model->idproduto]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="produtos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>