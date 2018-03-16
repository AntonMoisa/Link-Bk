<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>


<div class="container" id="ProductName">
    <div class="row">
        <div class="col-md-4" id="select1">
            <p>
                <?=  'Online store | ' ?>
                <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->idCategory])?>" style="text-decoration: none; color: black;"><?= $product->category->Category?></a>
                |<span style="color: #c03339"> <?= $product->Product?></span>
            </p>
        </div>
    </div>
</div>

<div class="container" style="min-height: 28rem;">
    <div class="row justify-content-around">

        <div class="col-md-3 align-self-center">
            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->idProduct]) ?>">
                    <?= Html::img("@web/images/products/{$product->image}", ['class' => 'img-fluid', 'id' => 'Product', 'alt' => 'Responsive image' , 'style' => 'width: 20rem', 'height: auto'])?>
        </a>
        </div>

        <div class="col-md-7 align-self-center">
            <div>
                <p><span style="font-size: 2rem;"><?= $product->Product?></span><br><span style="font-size: 1.5rem;"><?= $product->price?>.00$</span></p>
                <p><label>QUANTITY :</label><input type="text" value="1" id="qty"></p>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->idProduct]) ?>">
                                <button type="submit" data-id="<?= $product->idProduct ?>" class="btn cart add-to-cart" id="button">
                                    add to cart
                                </button>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->idCategory]) ?>">
                                    <button type="submit" class="btn cart" id="button">
                                   continue shopping
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, sit.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, sequi!</p>
            </div>
        </div>

    </div>
</div>

<div class="container" id="carousel">
    <div class="row justify-content-center">

        <?php $count = count($popular_model); $i=1; foreach ($popular_model as $item) : ?>
            <?php if($i <= 4 || $i == $count) : ?>
                <div class="col-2">
                    <div class="mb-3 box-shadow">
                        <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $item->idProduct]) ?>">
                            <?= Html::img("@web/images/products/{$item->image}", ['class' => 'img-fluid', 'id' => 'Product', 'alt' => 'Responsive image' , 'style' =>  'max-width: 50%', 'height: auto'])?>
                        </a>
                        <div class="card-body">
                            <p class="text-muted"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->idProduct]) ?>"><?= $product->Product?><br><?= $product->price?>.00$</a></p>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endif;?>
        <?php endforeach;?>

    </div>
</div>

