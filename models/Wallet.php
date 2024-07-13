<?php

namespace app\models;

/**
 * @property int $id
 * @property float $ballance
 *
 * @property-read  User $owner
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wallet}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ballance'], 'number'],
        ];
    }

    public function getOwner()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}