<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/21/2017
 * Time: 12:43 PM
 */

namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\Demo;

class DemoController extends Controller
{
    public function actionIndex()
    {
        $model = new Demo();
//        echo $model->getAttributeLabel('username');
        $model->username = "Minhvt";
        $data = "Hello word";
        return $data . ' ' . $model->username;
    }
}