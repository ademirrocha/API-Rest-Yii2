<?php

use yii\db\Migration;

/**
 * Class m210418_193926_create_products
 */
class m210418_193926_create_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string(60)->notNull(),
            'description' => $this->text(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'status' => $this->smallInteger(1)->defaultValue(1)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey('fk_products_categories_id', 'products', 'category_id', 'categories', 'id');

    }

    /**
     * {@inheritdoc} 
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_products_categories_id', 'products');
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210418_193926_create_products cannot be reverted.\n";

        return false;
    }
    */
}
