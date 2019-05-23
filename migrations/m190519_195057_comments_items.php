<?php

use yii\db\Migration;

/**
 * Class m190519_195057_comments_items
 */
class m190519_195057_comments_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comments', 'item_id', 'integer');

        $this->createIndex(
            'idx-comments-item_id',
            'comments',
            'item_id'
        );

        $this->addForeignKey(
            'fk-comments-item_id',
            'comments',
            'item_id',
            'items',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('comments', 'item_id');
       $this->dropIndex('idx-comments-item_id', 'comments');
       $this->dropForeignKey('fk-comments-item_id', 'comments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190519_195057_comments_items cannot be reverted.\n";

        return false;
    }
    */
}
