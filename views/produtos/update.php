<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Produtos $model */

$this->title = 'Atualizar Produto: ' . $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Relatório: ' . $model->descricao, 'url' => ['view', 'id' => $model->idproduto]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="produtos-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
    <div class="row mt-2">
        <div class="col-md-12 mb-2"><?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'vlUnitarioStr', [
                                    'template' => '<label class="form-label">Valor da Unidade</label><div class="input-group">
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
                                    'value' => ($model->valor_unitario) ? $model->valor_unitario : '',
                                    'class' => 'form-control'
                                ]) ?>
            <?= $form->field($model, 'valor_unitario')->hiddenInput()->label(false) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'quantidade')->textInput() ?>
        </div>
        <div></div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>