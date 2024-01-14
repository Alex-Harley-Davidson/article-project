<?php

namespace console\helpers;

use common\models\Article;
use common\models\ArticleCategory;
use common\models\ArticleCategoryRelation;
use common\models\Author;
use Faker\Factory;
use yii\helpers\ArrayHelper;

class DataHelper
{

    private \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public static function generate(): void
    {
        $instance = new self;
        $instance->generateAuthors();
        $instance->generateArticles();
        $instance->generateArticleCategories();
        $instance->attachCategoriesToArticles();

    }

    public function generateAuthors(): void
    {
        for ($i = 0; $i < 10; $i++)
        {
            $author = new Author();
            $author->name = $this->faker->name();
            $author->year = mt_rand(1960, 2000);
            $author->biography = $this->faker->text(mt_rand(1000, 2000));
            $author->save();
            if ($author->errors) {
                break;
            }
        }

        if (!$author->errors) {
            echo "Авторы загружены" . PHP_EOL;
        }
    }

    public function generateArticles(): void
    {
        $authorIds = Author::find()->select("id")->asArray()->all();
        $authorIds = ArrayHelper::map($authorIds, "id", "id");

        for ($i = 0; $i < 100; $i++)
        {
            $article = new Article();
            $article->title = $this->faker->text(50);
            $article->anons = $this->faker->text(rand(100, 200));
            $article->text = $this->faker->text(rand(1000, 2000));
            $article->img = $this->faker->imageUrl(600, 400);
            $article->author_id = array_rand($authorIds);
            $article->save();
            if ($article->errors) {
                break;
            }
        }

        if (!$article->errors) {
            echo "Статьи загружены" . PHP_EOL;
        }
    }

    public function generateArticleCategories(): void
    {
        for ($i = 0; $i < 10; $i++)
        {
            $articleCategory = new ArticleCategory();
            $articleCategory->name = $this->faker->text(50);
            $articleCategory->description = $this->faker->text(rand(1000, 2000));
            $articleCategory->save();
            if ($articleCategory->errors) {
                break;
            }
        }

        if (!$articleCategory->errors) {
            echo "Категории статей загружены" . PHP_EOL;
        }
    }

    public function attachCategoriesToArticles(): void
    {
        $articleIds = Article::find()->select("id")->asArray()->all();
        $articleIds = ArrayHelper::map($articleIds, "id", "id");

        $articleCategoryIds = ArticleCategory::find()->select("id")->asArray()->all();
        $articleCategoryIds = ArrayHelper::map($articleCategoryIds, "id", "id");

        foreach ($articleIds as $articleId) {
            $categoryIds = array_rand($articleCategoryIds, 3);
            foreach ($categoryIds as $categoryId) {
                $articleCategoryRelation = new ArticleCategoryRelation();
                $articleCategoryRelation->article_id = $articleId;
                $articleCategoryRelation->category_id = $categoryId;
                $articleCategoryRelation->save();
                if ($articleCategoryRelation->errors) {
                    break 2;
                }
            }

        }

        if (!$articleCategoryRelation->errors) {
            echo "Категории к статьям прикреплены" . PHP_EOL;
        }
    }
}