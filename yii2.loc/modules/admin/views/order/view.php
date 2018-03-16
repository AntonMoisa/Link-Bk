<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->idorder;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Use this =></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= \yii\helpers\Url::to(['/admin']) ?>">Admin <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['category/index']) ?>">Category list</a>
                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['category/create']) ?>">Create Category</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdow">
                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['product/index']) ?>">Product list</a>
                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['product/create']) ?>">Create Product</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="order-view">

    <h1>Order № : <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idorder], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idorder], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idorder',
            'total_price',
            'order_date',
            'update_date',
            'First_name',
            'Last_name',
            'Telephone',
            'email:email',
        ],
    ]) ?>

    <?php $items = $model->productHasOrders;?>

    <div class="container">
    <div class="row justify-content-around">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="font-size: 1.4em;">YOUR BASKET ITEMS</th>
                    <th scope="col" style="font-size: 1.4em;">PRICE</th>
                    <th scope="col"  style="font-size: 1.4em;">QTY</th>
                    <th scope="col" style="font-size: 1.4em;">SUBTOTAL</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=0; foreach($items as $item): ?>
                    <tr>
                        <td style="height: 16rem;"><a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $item['Product_idProduct']]) ?>" style="text-decoration: none;"><span style="color: #282828;"><?= $model->productIdProducts[$i]['Product']?></span><br><?= \yii\helpers\Html::img("@web/images/products/{$model->productIdProducts[$i]['image']}", ['alt' => $model->productIdProducts[$i]['Product'] , 'class' => 'item-cart']) ?></a></td>
                        <td scope="row" style="height: 16rem;"><?= $model->productIdProducts[$i]['price']?>.00$</td>
                        <td style="height: 16rem;"><?= $item['qty']?></td>
                        <td style="height: 16rem;"><?= $item['price']?>.00$</td>
                    </tr>
                <?php $i++;?>
                <?php endforeach;?>
<!--                    --><?php //debug($model->productIdProducts) ?>
                </tbody>
            </table>
    </div>


    </div>
    </div>
</div>


