<?php

namespace app\api\modules\v1\controllers;

use fproject\rest\ActiveController;
use yii\web\Response;

/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/29/2017
 * Time: 2:47 PM
 */
class AuthenticationController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }
}