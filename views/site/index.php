<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap5\Modal;

/** @var yii\web\View $this */

$this->title = 'Arteliê';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent my-5">
        <h1 class="display-4"><?= Html::img('@web/assets/imgs/logoArt.png', ['width' => '500px', 'height' => '200px']) ?></h1>
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
                        <h2 class="text-center bold my-4"><?= Html::a(count($produtosList), '../web/produtos', ['class' => 'text-decoration-none text-dark']) ?></h2>
                        <div class="card text-center">
                            <?php Modal::begin([
                                'title' => '<h4>Novo produto</h4>',
                                'toggleButton' => ['label' => 'Novo Produto', 'class' => 'btn btn-success'],
                            ]);

                            echo $this->render('_form-produtos', ['produtosModel' => $produtosModel]);

                            Modal::end(); ?>
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
                        <h2 class="text-center bold my-4"><?= Html::a(count($clientesList), '../web/clientes', ['class' => 'text-decoration-none text-dark']) ?></h2>
                        <div class="card text-center">
                            <?php Modal::begin([
                                'title' => '<h4>Novo Cliente</h4>',
                                'toggleButton' => ['label' => 'Novo Cliente', 'class' => 'btn btn-success'],
                            ]);

                            echo $this->render('_form-clientes', ['clientesModel' => $clientesModel]);

                            Modal::end(); ?>
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
                        <h2 class="text-center bold my-4"><?= Html::a(count($encomendasList), '../web/encomendas', ['class' => 'text-decoration-none text-dark']) ?></h2>
                        <div class="card text-center">
                            <?php Modal::begin([
                                'title' => '<h4>Nova encomenda</h4>',
                                'toggleButton' => ['label' => 'Nova Encomenda', 'class' => 'btn btn-success'],
                            ]);

                            echo $this->render('_form-encomendas', ['encomendasModel' => $encomendasModel]);

                            Modal::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>