<?php

use yii\db\Migration;

/**
 * Class m190518_221258_foreign_keys
 */
class m190518_223632_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-items-category_id',
            'items',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comments-user_id',
            'comments',
            'user_id',
            'users',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-comments-user_id',
            'comments'
        );

        $this->dropForeignKey(
            'fk-items-category_id',
            'items'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190518_221258_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
