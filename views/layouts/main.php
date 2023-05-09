<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use kartik\icons\Icon;
use yii\bootstrap5\Nav;
use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;

Icon::map($this);
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => 'UTF-8'], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/assets/imgs/iconArt.png')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?= $this->render('_nav-main') ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs'], 'options' => ['class' => 'rounded p-2 mb-2', 'style' => 'background-color:#E8E8E8']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <div class="my-2">
                <?= $content ?>
            </div>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <?= $this->render('_footer') ?>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>