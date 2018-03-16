<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use app\widgets\Alert;
use yii\helpers\Html;
//use yii\helpers\Url;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="container">
        <div class="top-nav">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <div class="logo">
                        <a href="<?=\yii\helpers\Url::home()?>">
                            <?=Html::img('@web/images/icon/logo.png', ['alt' => 'Online store'])?>
                        </a>
                    </div>
                </div>
                <!-- /.col-md -->
                <div class="col-md-auto">
                    <ul class="top-nav_menu">
                        <li><a href="#">new arrivals</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <?php if (!Yii::$app->user->isGuest): ?>
                        <li><a href="<?= yii\helpers\Url::to(['/site/logout']) ?>"><?= Yii::$app->user->identity['username']?>(Logout)</a></li>
                        <?php endif;?>
                        <li><a href="<?= yii\helpers\Url::to(['/admin']) ?>">Sign in</a></li>
                    </ul>
                </div>
                <!-- /.col-md -->
                <div class="col-md-auto">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="#" onclick="return getCart()">
                                <?=Html::img('@web/images/icon/Shop-baskit.png', ['alt' => 'Shop-baskit'])?>
                            </a>
                        </div>
                            <div class="col">
                                <div class="search_box pull-right">
                                    <form method="get" action="<?= \yii\helpers\Url::to(['category/search']) ?>">
                                        <input type="text" placeholder="Search" name="search">
                                    </form>
                                </div>
                            </div>

                    </div>
                </div>
                <!-- /.col-md -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.top-nav -->
    </div>
    <!-- /.container -->
</header>

<?= $content?>


<footer class="footer">
    <div class="container-fluid">
        <span class="text-muted">&copy; 2018 Minsk</span>
    </div>
</footer>



<?php



\yii\bootstrap\Modal::begin([
    'header' => '<h2>Chopping cart</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">CONTINUE SHOPPING</button>
                <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-default">GO TO CART</a>
                <button type="button" class="btn btn-default" onclick="clearCart()">CLEAR CART</button>'
]);

\yii\bootstrap\Modal::end();
?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>




