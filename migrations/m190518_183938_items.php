<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190518_183938_items
 */
class m190518_183938_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('items', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->notNull(),
            'photos' => $this->string(),
            'cost' => $this->float()->notNull(),
            'category_id' => $this->integer()->defaultValue(1)
        ]);


        $this->createIndex(
            'idx-items-category_id',
            'items',
            'category_id'
        );


        $this->addForeignKey(
            'fk-items-category_id',
            'items',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropIndex(
            'idx-items-category_id',
            'items'
            );

        $this->dropForeignKey(
            'fk-items-category_id',
            'items'
        );


        $this->dropTable('items');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190518_183938_items cannot be reverted.\n";

        return false;
    }
    */
}
