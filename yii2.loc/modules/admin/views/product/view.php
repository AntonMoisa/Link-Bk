<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->idProduct;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idProduct' => $model->idProduct, 'Category_idCategory' => $model->Category_idCategory], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idProduct' => $model->idProduct, 'Category_idCategory' => $model->Category_idCategory], [
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
            'idProduct',
            'Category_idCategory',
            'Product',
            'price',
            'image',
            'popular_model',
            'new',
            'sale',
        ],
    ]) ?>

</div>
