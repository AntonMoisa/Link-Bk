<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>





<div class="container">
    <?php if( Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
    <div class="row justify-content-around">
    <?php if(!empty($session['cart'])) : ?>
    <div class="col-md-8">
        <div class="table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="color: silver; font-size: 16px;">YOUR BASKET ITEMS</th>
                    <th scope="col" style="color: silver; font-size: 16px;">PRICE</th>
                    <th scope="col" style="color: silver; font-size: 16px;">QTY</th>
                    <th scope="col" style="color: silver; font-size: 16px;" >SUBTOTAL</th>
                    <th scope="col"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item): ?>
                    <tr>
                        <th scope="row"><a href="<?= Url::to(['product/view', 'id' => $id]) ?>" style="text-decoration: none;"><span style="color: #282828;"><?= $item['name']?></span><br><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'] , 'class' => 'item-cart']) ?></a></th>
                        <td class="item-cart-option"><?= $item['price']?>.00$</td>
                        <td class="item-cart-option"><?= $item['qty']?></td>
                        <td class="item-cart-option"><?= $item['price'] * $item['qty']?></td>
                        <td class="item-cart-option"><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
<!--                --><?//= debug($session) ?>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <h4 style="color: silver;">ORDER SUMMARY</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Your Basket :<?= ' ' . $session['cart.qty']?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>SUBTOTAL <span style="color: #c03339;">$<?= $session['cart.sum']?></span></h4>
                </div>
            </div>




                <div class="row">
                    <div class="col">
                        <?php $form = ActiveForm::begin() ?>
                        <?= $form->field($order, 'First_name') ?>
                        <?= $form->field($order, 'Last_name') ?>
                        <?= $form->field($order, 'Telephone') ?>
                        <?= $form->field($order, 'email') ?>
                        <?= Html::submitButton('ORDER', ['class' => 'btn btn-danger']) ?>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>




        </div>





    <?php  else: ?>
        <h3>There are no products in your shopping cart</h3>
    <?php endif; ?>
    </div>
</div>
