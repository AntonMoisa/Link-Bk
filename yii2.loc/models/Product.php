<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.02.2018
 * Time: 9:36
 */

namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'Product';
    }

    public function getCategory (){
        return $this->hasOne(Category::className(), ['idCategory' => 'Category_idCategory']);
    }

    public function getProductHasOrder () {
        return $this->hasMany(ProductHasOrder::className(), ['Product_idProduct' => 'idProduct']);
    }
}