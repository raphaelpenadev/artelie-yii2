<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>

<?php


NavBar::begin([
 'brandLabel' => 'Arteliê',
 'brandUrl' => Yii::$app->homeUrl,
 'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
]);
echo Nav::widget([
 'options' => ['class' => 'navbar-nav'],
 'items' => [
  ['label' => 'Inicio', 'url' => ['/site/index']],
  ['label' => 'Clientes', 'url' => ['/clientes/index']],
  ['label' => 'Produtos', 'url' => ['/produtos/index']],
  ['label' => 'Encomendas', 'url' => ['/encomendas/index ']],
  Yii::$app->user->isGuest
   ? ['label' => 'Login', 'url' => ['/site/login']]
   : '<li class="nav-item">'
   . Html::beginForm(['/site/logout'])
   . Html::submitButton(
    'Logout (' . Yii::$app->user->identity->username . ')',
    ['class' => 'nav-link btn btn-link logout']
   )
   . Html::endForm()
   . '</li>'
 ]
]);
NavBar::end();
