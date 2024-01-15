<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 *
 * @property ArticleCategoryRelation[] $articleCategoryRelations
 */
class Article extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'article';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[ArticleCategoryRelations]].
     *
     * @return ActiveQuery
     */
    public function getArticleCategoryRelations(): ActiveQuery
    {
        return $this->hasMany(ArticleCategoryRelation::class, ['article_id' => 'id']);
    }
}
