<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <header>
        <?php $this->beginBody() ?>
        <?php
        NavBar::begin([
            'brandLabel' => 'Gallery',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            ],
            ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            ['label' => 'Home', 'url' => ['/home']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/login']]
                ) : (
                '<li>'
                . 
                '<a href =" '.Url::to('/photo/add').'">Add</a>'
                . '</li>' .
                '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello '.Yii::$app->user->identity->username.' <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href =" '.Url::to('/user/profile').'">Profile</a></li>
                    <li><a href =" '.Url::to('/photos?user='.Yii::$app->user->identity->id).'">Gallery</a></li>
                    <li>
                    '
                    . Html::beginForm(['/user/logout'], 'post')
                    . Html::submitButton(
                        'Logout',
                        ['class' => 'btn btn-link' , 'style' => 'padding-top: 13px;']
                        )
                    . Html::endForm()
                    . '</li></ul></li>'
                    )
                ],
                ]);
        NavBar::end();
        ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </header>
    <div class="container">
        <main>
            <?= $content ?>
        </main>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Gallery <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
