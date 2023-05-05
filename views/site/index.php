<?php

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

/** @var yii\web\View $this */

$this->title = 'Arteliê';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent my-5">
        <h1 class="display-4"><?= Html::img('@web/assets/logo.png') ?></h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Produtos</h3>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center">Quantidade de Produtos Registrados</h6>
                        <h2 class="text-center bold my-4"><?= Html::a(count($produtosList), 'clientes', ['class' => 'text-decoration-none text-dark']) ?></h2>
                        <div class="card text-center">
                            <?= Html::a('Produtos', './produtos', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Clientes</h3>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center">Quantidade de Clientes Registrados</h6>
                        <h2 class="text-center bold my-4"><?= Html::a(count($clientesList), 'clientes', ['class' => 'text-decoration-none text-dark']) ?></h2>
                        <div class="card text-center">
                            <?= Html::a('Clientes', './clientes', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Encomendas</h3>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title text-center">Quantidade de Encomendas Registradas</h6>
                        <h2 class="text-center bold my-4"><?= Html::a(count($encomendasList), 'clientes', ['class' => 'text-decoration-none text-dark']) ?></h2>
                        <div class="card text-center">
                            <?= Html::a('Encomendas', './encomendas', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>