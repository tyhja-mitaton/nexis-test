<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m240713_042821_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'amount' => $this->integer(),
            'price' => $this->float(),
            'user_id' => $this->integer(),
        ]);

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-item-user_id}}',
            '{{%item}}',
            'user_id',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-item-user_id}}',
            '{{%item}}'
        );

        $this->dropTable('{{%item}}');
    }
}
