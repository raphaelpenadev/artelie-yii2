<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Produtos $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="produtos-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($produtosModel, 'descricao')->textInput(['maxlength' => true]) ?>
    <div class="row mt-2">
        <div class="col-md-12 mb-2"><?= $form->field($produtosModel, 'tipo')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($produtosModel, 'vlUnitarioStr', [
                                    'template' => 'Valor da Unidade<div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="vlUnitarioAddon">R$</span>
                    </div>
                    {input}
                    {hint}
                    {error}
                </div>'
                                ])->textInput([
                                    'maxlength' => true,
                                    'data-mask' => '#.##0,00',
                                    'data-mask-reverse' => 'true',
                                    'aria-describedby' => 'vlUnitarioAddon',
                                    'value' => ($produtosModel->valor_unitario) ? $produtosModel->valor_unitario : 0
                                ]) ?>
            <?= $form->field($produtosModel, 'valor_unitario')->hiddenInput()->label(false) ?></div>
        <div class="col-md-6"><?= $form->field($produtosModel, 'quantidade')->textInput() ?>
        </div>
        <div></div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$vlUnitarioInput = Html::getInputId($produtosModel, 'valor_unitario');
$vlUnitarioStr = Html::getInputId($produtosModel, 'vlUnitarioStr');

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js', ['depends' => 'app\assets\AppAsset']);

$this->registerJs(<<<JS
$("#$form->id").on('beforeSubmit', function () {
    $("#$vlUnitarioStr").unmask();
    
    const val = $("#$vlUnitarioStr").val();

    if (val != null && val != '') {
        $("#$vlUnitarioInput").val(
            parseFloat(val ?? 0) / 100
        );
    }

    return true;
});

$(document).ready(function () {
    $("#$vlUnitarioStr").focusout(function () {
        sendFirstCategory();
    });
});
JS);
