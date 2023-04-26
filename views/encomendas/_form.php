<?php

use yii\helpers\Html;
use app\models\Clientes;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encomendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12 row">
        <?= $form->field($model, 'idcliente')->dropDownList(ArrayHelper::map(Clientes::find()
            ->all(), 'idcliente', 'nome'), [
            'prompt' => 'Informe o cliente',
        ])->label('Cliente') ?>
        <div class="col-md-6">
            <?= $form->field($model, 'valorEncomendaStr', [
                'template' => 'Valor da Encomenda<div class="input-group my-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="valorEncomendaAddon">R$</span>
                    </div>
                    {input}
                    {hint}
                    {error}
                </div>'
            ])->textInput([
                'maxlength' => true,
                'data-mask' => '#.##0,00',
                'data-mask-reverse' => 'true',
                'aria-describedby' => 'valorEncomendaAddon',
            ]) ?>
            <?= $form->field($model, 'valor')->hiddenInput()->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList(['P' => 'Pendente', 'A' => 'Aprovado', 'F' => 'Finalizado',], ['prompt' => 'Selecione o status da encomenda']) ?>
        </div>
    </div>

    <?= $form->field($model, 'descricao')->textArea(['rows' => 3, 'maxlength' => true]) ?>


    <!-- EDITANDO -->

</div>
<!-- FIM EDITANDO -->

<div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

<?php
$valorInput = Html::getInputId($model, 'valor');
$vlEncomendaStr = Html::getInputId($model, 'valorEncomendaStr');

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js', ['depends' => 'app\assets\AppAsset']);

$this->registerJs(<<<JS
$("#$form->id").on('beforeSubmit', function () {
    $("#$vlEncomendaStr").unmask();
    
    const val = $("#$vlEncomendaStr").val();

    if (val != null && val != '') {
        $("#$valorInput").val(
            parseFloat(val ?? 0) / 100
        );
    }

    return true;
});
JS);
