<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.02.2018
 * Time: 9:36
 */

namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getProduct (){
        return $this->hasMany(Product::className(), ['Category_idCategory' => 'idCategory']);
    }

    public function getCharaccategor (){
        return $this->hasMany(Category_has_Characteristic::className(), ['Category_idCategory' => 'idCategory']);
    }
}