<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $name
 * @property int|null $year
 * @property string|null $biography
 */
class Author extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'author';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['year'], 'integer'],
            [['biography'], 'string'],
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
            'name' => 'Name',
            'year' => 'Year',
            'biography' => 'Biography',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getArticles(): ActiveQuery
    {
        return $this->hasMany(Article::class, ["author_id" => "id"]);
    }
}
