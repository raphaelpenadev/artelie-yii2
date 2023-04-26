<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clientes-form">
    <?php yii\widgets\Pjax::begin(['id' => 'novo_cliente']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textArea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'contato')->textArea(['rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>