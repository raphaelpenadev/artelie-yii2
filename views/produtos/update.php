<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Produtos $model */

$this->title = 'Update Produtos: ' . $model->idproduto;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproduto, 'url' => ['view', 'idproduto' => $model->idproduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produtos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
