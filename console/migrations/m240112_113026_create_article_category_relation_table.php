<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_category_relation}}`.
 */
class m240112_113026_create_article_category_relation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_category_relation}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-article_category_relation-article_id',
            '{{%article_category_relation}}',
            'article_id',
            'article',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-article_category_relation-category_id',
            '{{%article_category_relation}}',
            'category_id',
            'article_category',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-article_category_relation-article_id',
            '{{%article_category_relation}}');

        $this->dropForeignKey(
            'fk-article_category_relation-category_id',
            '{{%article_category_relation}}');

        $this->dropTable('{{%article_category_relation}}');
    }
}
