<?php

use yii\db\Migration;

/**
 * Class m190518_213553_comments
 */
class m190518_213553_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
            'text' => $this->text()->notNull(),
            'user_name' => $this->string()->notNull(),
            'user_email' => $this->string()->notNull(),
            'user_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-comments-user_id',
            'comments',
            'user_id'
        );

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-comments-user_id',
            'comments'
        );

        $this->dropTable('comments');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190518_213553_comments cannot be reverted.\n";

        return false;
    }
    */
}
