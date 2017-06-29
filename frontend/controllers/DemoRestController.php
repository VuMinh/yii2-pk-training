<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/26/2017
 * Time: 4:37 PM
 */

namespace frontend\controllers;

use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class DemoRestController extends ActiveController
{
    public $modelClass = 'common\models\Rest';

    public function prepareDataProvider()
    {
        $query = \common\models\Rest::find()->all();
        return new ActiveDataProvider(['query' => $query,]);
    }
    public function actionDemo(){
        return $query = \common\models\Rest::find()->all();
    }

}