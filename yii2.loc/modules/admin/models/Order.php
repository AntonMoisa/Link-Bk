<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $idorder
 * @property string $total_price
 * @property string $order_date
 * @property string $update_date
 * @property string $First_name
 * @property string $Last_name
 * @property int $Telephone
 * @property string $email
 *
 * @property ProductHasOrder[] $productHasOrders
 * @property Product[] $productIdProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_price', 'order_date', 'First_name', 'Last_name', 'Telephone', 'email'], 'required'],
            [['total_price'], 'number'],
            [['order_date', 'update_date'], 'safe'],
            [['Telephone'], 'integer'],
            [['First_name', 'Last_name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idorder' => '№ Order',
            'total_price' => 'Total Price',
            'order_date' => 'Order Date',
            'update_date' => 'Update Date',
            'First_name' => 'First Name',
            'Last_name' => 'Last Name',
            'Telephone' => 'Telephone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasOrders()
    {
        return $this->hasMany(ProductHasOrder::className(), ['order_idorder' => 'idorder']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductIdProducts()
    {
        return $this->hasMany(Product::className(), ['idProduct' => 'Product_idProduct'])->viaTable('Product_has_order', ['order_idorder' => 'idorder']);
    }
}
