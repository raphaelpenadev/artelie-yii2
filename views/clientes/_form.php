<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJs(<<<JS
    $(document).ready(function(){ 
         $("#novo_cliente").on("pjax:end", function() {
             $.pjax.reload({container:"#clientes"});  //Reload GridView
         });
     });
 JS);
?>

<div class="clientes-form">
    <?php yii\widgets\Pjax::begin(['id' => 'novo_cliente']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="col">
        <div class="mt-2">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="mt-2">
            <?= $form->field($model, 'descricao')->textArea(['maxlength' => true, 'rows' => 4]) ?>
        </div>
        <div class="mt-2">
            <?= $form->field($model, 'contato')->textArea(['rows' => 5]) ?>
        </div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>