<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 26.02.2018
 * Time: 16:36
 */

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart ($product, $qty = 1)
    {
        if (isset($_SESSION['cart'][$product->idProduct])) {
            $_SESSION['cart'][$product->idProduct]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->idProduct] = [
                'qty' => $qty,
                'name' => $product->Product,
                'price' => $product->price,
                'img' => $product->image
            ];
        }

        $_SESSION['cart.qty'] = isset ($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset ($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function recalc($id)
    {
        if(!isset($_SESSION['cart'][$id])) return false;
        $qtymin =  $_SESSION['cart'][$id]['qty'];
        $summin =  $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtymin;
        $_SESSION['cart.sum'] -= $summin;
        unset($_SESSION['cart'][$id]);
    }

}