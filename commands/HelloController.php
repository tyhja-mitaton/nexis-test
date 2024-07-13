<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Item;
use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionTrade($itemId)
    {
        $buyer = User::findOne(1); //для теста считаем что текущий юзер 1 вместо \Yii::$app->user
        $item = Item::findOne($itemId);
        $owner = $buyer->getItems()->where(['id' => $itemId])->exists();
        if(!empty($item) && !empty($buyer) && !$owner && $item->amount > 0 && $item->price <= $buyer->wallet->ballance) {
            // считаю что у всех товаров есть продавец
            $item->user_id = $buyer->id;
            $item->save();
            $buyer->wallet->ballance -= $item->price;
            $buyer->wallet->save();
        }
    }
}
