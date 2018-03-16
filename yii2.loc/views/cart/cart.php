<?php if(!empty($session['cart'])) : ?>

    <div class="table">
        <table class="table">
            <thead>
                <tr>
                    <th>YOUR BASKET ITEMS</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>SUBTOTAL</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item): ?>
            <tr>
                <td><?= $item['name']?><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'] , 'height' => "150"]) ?></td>
                <td><?= $item['price']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $session['cart.qty']?></td>
                <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>




<?php  else: ?>
    <h3>There are no products in your shopping cart</h3>
<?php endif; ?>