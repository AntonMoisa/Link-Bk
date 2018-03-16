<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 20.02.2018
 * Time: 12:25
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category_has_Characteristic extends ActiveRecord
{
    public static function tableName()
    {
        return 'category_has_characteristic';
    }

    public function getCategorcharact(){
        return $this->hasOne(Category::className(), ['idCategory' => 'Category_idCategory']);
    }

}