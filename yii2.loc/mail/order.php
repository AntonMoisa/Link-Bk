    <div class="table">
        <table class="table">
            <thead>
            <tr>
                <th>NAME ITEMS</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>YOUR BASKET</th>
                <th>SUBTOTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item): ?>
                <tr>
                    <td><?= $item['name']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $session['cart.qty']?></td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>



