<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Acesso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os campos a seguir para acessar o painel administrador:</p>

    <div class="col-md-12">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Login') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Senha') ?>

        <?= $form->field($model, 'rememberMe')->checkbox()->label('Lembrar de mim') ?>

        <div class="form-group text-end">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Acessar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>