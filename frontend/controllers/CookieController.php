<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/29/2017
 * Time: 3:16 PM
 */

namespace frontend\controllers;


use yii\web\Controller;
use yii\web\Cookie;

class CookieController extends Controller
{
    public function actionIndex()
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => 'Minh_vt',
        ]));
        return $this->render('index');
    }
    public function actionView()
    {
        $cookies = \Yii::$app->request->cookies;
        echo $cookies['cookieValidationKey'];
    }
}