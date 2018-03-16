<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2018
 * Time: 19:37
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
Use Yii;


class ProductController extends AppController
{
    public function actionView($id){
//        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product))
            throw new \yii\web\HttpException(404, 'Вы опаздали, данный товар раскупили.');
//        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();    //жадная загрузка
        $popular_model = Product::find()->indexBy('idProduct')->where(['popular_model' => 1])->all();
        $this->setMeta('Online store | ' . $product->Product );
        return $this->render('view', compact('product', 'popular_model', 'rand'));
    }




}