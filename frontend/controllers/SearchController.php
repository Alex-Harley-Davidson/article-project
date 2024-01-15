<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleCategory;
use common\models\Author;
use yii\rest\Controller;
use yii\web\Response;

class SearchController extends Controller
{

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    /**
     * @return mixed
     */
    public function actionArticleByTitle(string $title)
    {
        return Article::find()->where(["=", "title", $title])->all();
    }

    /**
     * @return mixed
     */
    public function actionArticleByAuthor(string $authorId)
    {
        $author = Author::findOne($authorId);
        return $author->articles;
    }

    /**
     * @return mixed
     */
    public function actionArticleByCategory(string $categoryId)
    {
        $articleCategory = ArticleCategory::findOne($categoryId);
        return $articleCategory->articles;
    }

}