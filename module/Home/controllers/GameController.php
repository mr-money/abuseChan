<?php

namespace app\module\Home\controllers;

use yii\web\Controller;

class GameController extends Controller
{

    public function init()
    {
        parent::init();
    }
    
    public function actionTetris()
    {
        return $this->render('tetris');
    }

}
