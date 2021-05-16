<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use app\models\User;

AppAsset::register($this);
ltAppAsset::register($this);
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

    <?php
//        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
//        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +7(999)999-99-99</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> voltron@localhost</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.png', ['alt' => 'Voltron Tech'])?></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                            <input type="text" placeholder="Search" name="q">
                        </form>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(!Yii::$app->user->isGuest):?>
                            <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i><?= Yii::$app->user->identity['username']?> (Выход) </a></li>
                            <?php
                                $user = User::findByUsername(Yii::$app->user->identity['username']);
                                if($user->role == 'admin'):?>
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-lock"></i> Заказы</a></li>
                                <?php endif;?>
                            <?php endif;?>
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                            <?php if(Yii::$app->user->isGuest):?>
                                <li><a href="<?= \yii\helpers\Url::to(['/site/login'])?>"><i class="fa fa-lock"></i> Login</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->




<?= $content ?>
<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
]);

\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>