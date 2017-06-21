<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/21/2017
 * Time: 2:08 PM
 */

namespace frontend\controllers;


use yii\web\Controller;

class HelloController extends Controller
{

    public function actionIndex(){
        return $this->render('index');
    }
}