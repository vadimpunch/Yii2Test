<?php

use yii\db\Migration;

/**
 * Class m190518_215434_category
 */
class m190518_215434_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
                'id' => $this->primaryKey(),
                'title' => $this->string(100),
                'description' => $this->text()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropTable('categories');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190518_215434_category cannot be reverted.\n";

        return false;
    }
    */
}
