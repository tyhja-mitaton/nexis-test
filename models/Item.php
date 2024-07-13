<?php

namespace app\models;

/**
 * @property int $id
 * @property int $amount
 * @property int $user_id
 * @property float $price
 *
 * @property-read  User $owner
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item}}';
    }

    public function beforeSave($insert)
    {
        if(!$insert && $this->isAttributeChanged('user_id')) {
            TradeHistory::create($this->id,
                $this->getOldAttribute('user_id'),
                $this->user_id,
                $this->price
            );
        }
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'user_id'], 'integer'],
            [['price'], 'number'],
        ];
    }

    public function getOwner()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}