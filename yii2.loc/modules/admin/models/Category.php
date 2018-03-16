<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property int $idCategory
 * @property int $parent_id
 * @property string $Category
 * @property string $keywords
 * @property string $description
 *
 * @property CategoryHasCharacteristic[] $categoryHasCharacteristics
 * @property Characteristic[] $characteristicIdCharacteristics
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['Category'], 'required'],
            [['Category'], 'string', 'max' => 45],
            [['keywords', 'description'], 'string', 'max' => 255],
            [['Category'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCategory' => '№ Category',
            'parent_id' => 'Parent Category',
            'Category' => 'Category',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }

    public function getCategoryCategory(){
        return $this->hasOne(Category::className(), ['idCategory' => 'parent_id']);
}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryHasCharacteristics()
    {
        return $this->hasMany(CategoryHasCharacteristic::className(), ['Category_idCategory' => 'idCategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristicIdCharacteristics()
    {
        return $this->hasMany(Characteristic::className(), ['idCharacteristic' => 'Characteristic_idCharacteristic'])->viaTable('Category_has_Characteristic', ['Category_idCategory' => 'idCategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['Category_idCategory' => 'idCategory']);
    }
}
