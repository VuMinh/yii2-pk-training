<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/29/2017
 * Time: 3:04 PM
 */

namespace frontend\controllers;


use yii\web\Controller;

class SessiondemoController extends Controller
{
    public function actionIndex()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->set('name','Minh vt');
        $session->close();
        return $this->render('index');
    }
    public function actionView()
    {
        $session = \Yii::$app->session;
        $name = $session->get('name');
        echo $name;
    }
}