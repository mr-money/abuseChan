<?php

namespace app\module\Admin\controllers;

//use yii\web\Controller;

/**
 * Default controller for the `Admin` module
 */
class DefaultController extends \app\controllers\CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
