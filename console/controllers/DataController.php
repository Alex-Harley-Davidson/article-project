<?php

namespace console\controllers;

use console\helpers\DataHelper;
use yii\console\Controller;

class DataController extends Controller
{

    public function actionGenerate(): void
    {

        DataHelper::generate();

    }
}