<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="clientes-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="col">
        <div class="mt-2">
            <?= $form->field($clientesModel, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="mt-2">
            <?= $form->field($clientesModel, 'descricao')->textArea(['maxlength' => true, 'rows' => 4]) ?>
        </div>
        <div class="mt-2">
            <?= $form->field($clientesModel, 'contato')->textArea(['rows' => 5]) ?>
        </div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>