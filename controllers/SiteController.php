<?php

namespace yihai\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['/system']);
    }
}
