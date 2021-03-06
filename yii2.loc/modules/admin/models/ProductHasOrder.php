<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Product_has_order".
 *
 * @property int $Product_idProduct
 * @property int $order_idorder
 * @property string $price
 * @property int $qty
 *
 * @property Product $productIdProduct
 * @property Order $orderIdorder
 */
class ProductHasOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product_has_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Product_idProduct', 'order_idorder', 'price', 'qty'], 'required'],
            [['Product_idProduct', 'order_idorder', 'qty'], 'integer'],
            [['price'], 'number'],
            [['Product_idProduct', 'order_idorder'], 'unique', 'targetAttribute' => ['Product_idProduct', 'order_idorder']],
            [['Product_idProduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['Product_idProduct' => 'idProduct']],
            [['order_idorder'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_idorder' => 'idorder']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Product_idProduct' => 'Product Id Product',
            'order_idorder' => 'Order Idorder',
            'price' => 'Price',
            'qty' => 'Qty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductIdProduct()
    {
        return $this->hasOne(Product::className(), ['idProduct' => 'Product_idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIdorder()
    {
        return $this->hasOne(Order::className(), ['idorder' => 'order_idorder']);
    }
}
