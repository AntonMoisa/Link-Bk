<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 26.02.2018
 * Time: 16:29
 */

namespace app\controllers;
use app\models\Cart;
use app\models\Product;
use app\models\Order;
use app\models\ProductHasOrder;
//use app\models\User;
use Yii;


class CartController extends AppController
{
    public function actionAdd ()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();//подключаем сессию
        $cart = new Cart();//создаем обьект
        $cart->addToCart($product, $qty);//всовываем обьек product
//        debug($product);
        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('cart', compact('session'));
    }

    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart', compact('session'));
    }
    
    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart', compact('session'));
}

    public function actionShow() {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart', compact('session'));
    }

    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Online store | Shop');
        $order = new Order();

        if ($order->load(Yii::$app->request->post())){
//            debug($session['cart.sum']);
            $order->total_price = $session['cart.sum'];
            if ($order->save()){
                $this->saveProductHasOrder($session['cart'], $order->idorder);
//                debug($order->idorder);
                Yii::$app->session->setFlash('success', 'OK');
                Yii::$app->mailer->compose('order', compact('session'))
                    ->setFrom(['amoisa8795@gmail.com' => 'AntonMoisa'])
                    ->setTo($order->email)
                    ->setSubject('Order Onlinestore')
                    ->send() ;
                $session->remove('cart');
                $session->remove('cart.sum');
                $session->remove('cart.qty');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'F*U');
            }
        }
        return $this->render('view', compact('session',   'order'))  ;

    }


    public function saveProductHasOrder($items, $order_idorder){
        foreach ($items as $id => $item){
            $ProductHasOrder = new ProductHasOrder();
            $ProductHasOrder->Product_idProduct = $id;
            $ProductHasOrder->order_idorder = $order_idorder;
            $ProductHasOrder->price = $item['price'] * $item['qty'];
            $ProductHasOrder->qty = $item['qty'];
            $ProductHasOrder->save();
//            debug([$item, $id, $order_idorder,$item['price'],$item['qty'], $item['price'] * $item['qty']]);

        }
    }
}