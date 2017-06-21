<?php

use yii\db\Migration;

class m170621_073555_flash_card extends Migration
{
    public function safeUp()
    {
        $this->createTable('flash_card', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
        ]);

    }

    public function safeDown()
    {
        $this->dropTable('flash_card');
        echo "m170621_073555_flash_card cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170621_073555_flash_card cannot be reverted.\n";

        return false;
    }
    */
}
