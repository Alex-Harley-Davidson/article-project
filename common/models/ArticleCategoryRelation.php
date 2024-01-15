<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_category_relation".
 *
 * @property int $id
 * @property int|null $article_id
 * @property int|null $category_id
 *
 * @property Article $article
 * @property ArticleCategory $category
 */
class ArticleCategoryRelation extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'article_category_relation';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['article_id', 'category_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::class, 'targetAttribute' => ['article_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return ActiveQuery
     */
    public function getArticle(): ActiveQuery
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(ArticleCategory::class, ['id' => 'category_id']);
    }
}
