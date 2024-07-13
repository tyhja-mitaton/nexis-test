<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%wallet}}`
 */
class m240713_042242_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'wallet_id' => $this->integer(),
            'accessToken' => $this->string(),
        ]);

        // add foreign key for table `{{%wallet}}`
        $this->addForeignKey(
            '{{%fk-user-wallet_id}}',
            '{{%user}}',
            'wallet_id',
            '{{%wallet}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%wallet}}`
        $this->dropForeignKey(
            '{{%fk-user-wallet_id}}',
            '{{%user}}'
        );

        $this->dropTable('{{%user}}');
    }
}
