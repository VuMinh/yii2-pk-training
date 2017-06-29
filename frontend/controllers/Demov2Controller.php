<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/26/2017
 * Time: 4:47 PM
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Rest;
//use yii\httpclient\Client;

class Demov2Controller extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $rest = Rest::find()->all();
        return $rest;
    }
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $rest = new Rest ();
        $rest->attributes = \Yii::$app->request->post();
        if ($rest->validate()) {
            $rest->save();
            return array(
                'status' => 1,
                'data' => 'Đã thêm thành công'
            );
        } else {
            return array(
                'status' => 0,
            );
        }
    }
}