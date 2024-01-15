<?php

namespace frontend\models;

use common\models\Article as CommonArticle;
use yii\web\Linkable;

class Article extends CommonArticle implements Linkable
{
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
        ];
    }
}