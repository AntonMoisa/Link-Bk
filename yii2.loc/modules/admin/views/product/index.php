<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idProduct',
//            'Category_idCategory',
            [
                'attribute' => 'Category_idCategory',
                'value' => function($data){
                    return $data->categoryIdCategory->Category;
                }
            ],
            'Product',
            'price',
//            'image',
            [
                'attribute' => 'image',
                'value' => function($data){
                    return '<div class="col-md-4">' . yii\helpers\Html::img("@web/images/products/{$data->image}", ['class' => 'img-fluid', 'id' => 'Product', 'alt' => 'Responsive image' , 'style' =>  'width: 100%', 'height: auto'])
                    . '<div>';
                },
                'format' => 'html',
            ],
            'popular_model',
            'new',
            'sale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

