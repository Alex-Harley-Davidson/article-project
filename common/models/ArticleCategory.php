<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string|null $description
 *
 * @property ArticleCategoryRelation[] $articleCategoryRelations
 */
class ArticleCategory extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'article_category';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[ArticleCategoryRelations]].
     *
     * @return ActiveQuery
     */
    public function getArticleCategoryRelations(): ActiveQuery
    {
        return $this->hasMany(ArticleCategoryRelation::class, ['category_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getArticles(): ActiveQuery
    {
        return $this->hasMany(Article::class, ['id' => 'article_id'])->via('articleCategoryRelations');
    }
}
