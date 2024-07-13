<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * @property int $id
 * @property int $item_id
 * @property int $sold_by
 * @property int $bought_by
 * @property int $date
 * @property float $price
 */
class TradeHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trade_history}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['date'],
                    self::EVENT_BEFORE_UPDATE => null,
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'sold_by', 'bought_by'], 'integer'],
            [['price'], 'number'],
        ];
    }

    public function getItems()
    {
        return $this->hasMany(Item::class, ['id' => 'item_id']);
    }

    public function getSellers()
    {
        return $this->hasMany(User::class, ['id' => 'sold_by']);
    }

    public function getBuyers()
    {
        return $this->hasMany(User::class, ['id' => 'bought_by']);
    }

    public static function create(int $itemId, int $sellerId, int $buyerId, float $price)
    {
        $record = new self();
        $record->item_id = $itemId;
        $record->sold_by = $sellerId;
        $record->bought_by = $buyerId;
        $record->price = $price;
        $record->save(false);
    }
}