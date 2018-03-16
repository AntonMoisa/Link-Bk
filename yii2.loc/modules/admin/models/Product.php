<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property int $idProduct
 * @property int $Category_idCategory
 * @property string $Product
 * @property string $price
 * @property string $image
 * @property string $popular_model
 * @property string $new
 * @property string $sale
 *
 * @property CharacteristicProduct[] $characteristicProducts
 * @property CategoryHasCharacteristic[] $categoryHasCharacteristicCategoryIdCategories
 * @property Category $categoryIdCategory
 * @property ProductHasOrder[] $productHasOrders
 * @property Order[] $orderIdorders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Category_idCategory', 'Product', 'price', 'popular_model', 'new', 'sale'], 'required'],
            [['Category_idCategory'], 'integer'],
            [['price'], 'number'],
            [['popular_model', 'new', 'sale'], 'string'],
            [['Product'], 'string', 'max' => 45],
            [['image'], 'string', 'max' => 50],
            [['Category_idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_idCategory' => 'idCategory']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProduct' => 'Id Product',
            'Category_idCategory' => 'Category',
            'Product' => 'Product',
            'price' => 'Price',
            'image' => 'Image',
            'popular_model' => 'Popular Model',
            'new' => 'New',
            'sale' => 'Sale',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristicProducts()
    {
        return $this->hasMany(CharacteristicProduct::className(), ['Product_idProduct' => 'idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryHasCharacteristicCategoryIdCategories()
    {
        return $this->hasMany(CategoryHasCharacteristic::className(), ['Category_idCategory' => 'Category_has_Characteristic_Category_idCategory', 'Characteristic_idCharacteristic' => 'Category_has_Characteristic_Characteristic_idCharacteristic'])->viaTable('Characteristic_Product', ['Product_idProduct' => 'idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryIdCategory()
    {
        return $this->hasOne(Category::className(), ['idCategory' => 'Category_idCategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasOrders()
    {
        return $this->hasMany(ProductHasOrder::className(), ['Product_idProduct' => 'idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIdorders()
    {
        return $this->hasMany(Order::className(), ['idorder' => 'order_idorder'])->viaTable('Product_has_order', ['Product_idProduct' => 'idProduct']);
    }
}
