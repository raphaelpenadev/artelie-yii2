<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encomendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idcliente')->textInput() ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'P' => 'P', 'A' => 'A', 'F' => 'F', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
