<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */

$this->title = 'Update Encomendas: ' . $model->idencomenda;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idencomenda, 'url' => ['view', 'idencomenda' => $model->idencomenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
