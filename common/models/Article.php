<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 *
 * @property ArticleCategoryRelation[] $articleCategoryRelations
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[ArticleCategoryRelations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategoryRelations()
    {
        return $this->hasMany(ArticleCategoryRelation::class, ['article_id' => 'id']);
    }
}
