<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>

<?php


NavBar::begin([
  'brandLabel' => Html::img('@app/web/assets/icon.png', [
    'style' => 'width: 2em; height: auto; z-index: 200',
  ]),
  'brandUrl' => Yii::$app->homeUrl,
  'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
]);

echo Nav::widget([
  'options' => ['class' => 'navbar-nav mx-auto'],
  'encodeLabels' => false,
  'items' => [
    ['label' => 'Inicio', 'url' => ['/']],
    ['label' => 'Produtos', 'url' => ['/produtos']],
    ['label' => 'Clientes', 'url' => ['/clientes']],
    ['label' => 'Encomendas', 'url' => ['/encomendas']],

  ]
]);


echo Nav::widget([
  'options' => [
    'class' => 'navbar-nav ml-auto'
  ],
  'encodeLabels' => false,
  'items' => [
    Yii::$app->user->isGuest
      ? ['label' => Icon::show('user') . 'Entrar', 'url' => ['/site/login']]
      : '<li class="nav-item">'
      . Html::beginForm(['/site/logout'])
      . Html::submitButton(
        'Sair (' . Yii::$app->user->identity->username . ')',
        ['class' => 'nav-link btn btn-link logout']
      )
      . Html::endForm()
      . '</li>'
  ],
]);
NavBar::end();
