<?php

namespace common\models;

use Yii;

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
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name'], 'required'],
            [['parent_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
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
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategoryRelations()
    {
        return $this->hasMany(ArticleCategoryRelation::class, ['category_id' => 'id']);
    }
}
