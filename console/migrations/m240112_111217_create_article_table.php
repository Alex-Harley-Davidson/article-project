<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m240112_111217_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'anons' => $this->text(),
            'text' => $this->text(),
            'img' => $this->string(),
            'author_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-article-author_id',
            '{{%article}}',
            'author_id',
            'author',
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
            'fk-article-author_id',
            '{{%article}}');

        $this->dropTable('{{%article}}');
    }
}
