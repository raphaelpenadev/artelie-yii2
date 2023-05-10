<?php

use yii\helpers\Html;
use app\models\Clientes;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Encomendas $model */

$this->title = 'Atualizar Encomenda: ' . $model->idcliente0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcliente0->nome, 'url' => ['view', 'id' => $model->idencomenda]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="encomendas-update">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
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
                'aria-describedby' => 'vlEncomendaAddon',
                'value' => ($model->valor_unitario) ? $model->valor_unitario : 0
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

</div>