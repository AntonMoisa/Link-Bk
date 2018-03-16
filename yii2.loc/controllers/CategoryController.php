<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 20.02.2018
 * Time: 11:06
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
Use Yii;
use yii\data\Pagination;


class CategoryController extends AppController
{
    public function actionIndex()
    {
        $popular_model = Product::find()->where(['popular_model' => '1',])->all();
        $this->setMeta('Online_store');
        return $this->render('index', compact('popular_model'));
    }


    public function actionView($id){
//        $id = Yii::$app->request->get('id');//выводим страницу из масива get

        $category = Category::findOne($id);
        if (empty($category))
            throw new \yii\web\HttpException(404, 'Данная категория товаров отсутствует.');


//        $products = Product::find()->where(['Category_idCategory' => $id])->all();
        $query = Product::find()->where(['Category_idCategory' => $id]);//выборка по таблице продуктов по id категории продукта
        $pages = new Pagination(['totalCount' => $query->count()/*считаем общее число продуктов*/,
            'pageSize' => 6/*число продуктов на страницу*/, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Online store | ' . $category->Category, $category->keywords, $category->description);//впиливаем метатеги в страницу
        return $this->render('view', compact('products', 'pages', 'category'));//рендер вида страницы view куда передпем переменные
    }

    public function actionSearch(){
        $search = trim( Yii::$app->request->get('search'));
        $this->setMeta('Online store | ' . 'Search :' . ' ' . $search);
        if(!$search)
            return $this->render('search');
        $query = Product::find()->where(['like', 'Product', $search]);
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'search'));
    }

}