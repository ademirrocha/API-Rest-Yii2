<?php

use yii\db\Migration;

/**
 * Class m210418_192227_create_categories
 */
class m210418_192227_create_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        $this->insert('categories', [
            'name' => 'Diversos',
            'created_at' => date('Y-m-d H:i:s')
        ]);

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
        echo "m210418_192227_create_categories cannot be reverted.\n";

        return false;
    }
    */
}
