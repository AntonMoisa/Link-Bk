<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


?>

<div class="container">
    <div class="row justify-content-between">
        <div class="col" id="select1">

                <?=  'Online store | ' . $category->Category?>

        </div>
        <?php if(!empty($products)):?>
        <div class="col-md-2">

                <select name="select" id="select2">
                    <option selected value="1">Popular model</option>
                    <option value="2">Price</option>
                    <option value="3">Sale</option>
                    <option value="4">New</option>
                </select>

        </div>
        <?php endif;?>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4" >
            <h2 class="title" style="padding-left: 1rem;">CATALOGUE</h2>
            <ul id="catalog">
                <!--Выводим каталог-->
                <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
            </ul>
        </div>
        <!-- /.col-md-4 -->
        <!-- Выводим товары-->
        <?php if(!empty($products)):?>
            <div class="col-md-8">
<!--                <div class="container" id="container-card">-->
                    <div class="row justify-content-start" style="min-height: 370px;" id="container-card">
                        <?php foreach($products as $product): ?>
                            <div class="col-md-4">
                                <div class="mb-4 box-shadow">
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->idProduct]) ?>">
                                        <?= Html::img("@web/images/products/{$product->image}", ['class' => 'card-img-top', 'alt' => $product->Product])?>
                                    </a>
                                    <div class="card-body">
                                        <p class="text-muted"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->idProduct]) ?>"><?= $product->Product?><br><?= $product->price?>.00$</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
<!--                </div>-->

                <div class="row">
                    <div class="col align-self-end">

                        <?php
                        echo  \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                    </div>
                </div>
            </div>

        <?php else :?>

        <div class="col-md-8">
        <h2>В данной категории товары временно отсутствуют.</h2>
            <?=Html::img('@web/images/icon/figa.jpg', ['alt' => 'Responsive image', 'style' => 'max-width: 100%;'])?>
        </div>
        <?php endif;?>
        <!-- /.col-md-8 -->

    </div>
    <!-- /.row -->

</div>
