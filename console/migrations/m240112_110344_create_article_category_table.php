<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_category}}`.
 */
class m240112_110344_create_article_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(0),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_category}}');
    }
}
