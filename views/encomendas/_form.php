<?php

use yii\helpers\Html;
use app\models\Clientes;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJs(<<<JS
    $(document).ready(function(){ 
         $("#nova_encomenda").on("pjax:end", function() {
             $.pjax.reload({container:"#encomendas"});  //Reload GridView
         });
     });
 JS);
?>

<div class="encomendas-form">
    <?php yii\widgets\Pjax::begin(['id' => 'nova_encomenda']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?= $form->field($encomendasModel, 'idcliente')->dropDownList(ArrayHelper::map(Clientes::find()
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
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(['P' => 'Pendente', 'A' => 'Aprovado', 'F' => 'Finalizado',], ['prompt' => 'Selecione o status da encomenda']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dt_entrega')->input('date') ?>
        </div>
    </div>

    <?= $form->field($model, 'descricao')->textArea(['rows' => 3, 'maxlength' => true]) ?>


    <!-- EDITANDO -->

</div>
<!-- FIM EDITANDO -->

<div class="form-group mt-2">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>

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
