<?php

namespace app\module\Home\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Home` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        echo 'Hello World';
        return $this->render('index');
    }
}
