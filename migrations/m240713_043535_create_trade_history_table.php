<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trade_history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240713_043535_create_trade_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trade_history}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(),
            'sold_by' => $this->integer(),
            'bought_by' => $this->integer(),
            'price' => $this->float(),
            'date' => $this->integer(),
        ]);

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-trade_history-item_id}}',
            '{{%trade_history}}',
            'item_id',
            '{{%item}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-trade_history-sold_by}}',
            '{{%trade_history}}',
            'sold_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-trade_history-bought_by}}',
            '{{%trade_history}}',
            'bought_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%item}}`
        $this->dropForeignKey(
            '{{%fk-trade_history-item_id}}',
            '{{%trade_history}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-trade_history-sold_by}}',
            '{{%trade_history}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-trade_history-bought_by}}',
            '{{%trade_history}}'
        );

        $this->dropTable('{{%trade_history}}');
    }
}
