<?php

namespace backend\controllers;

use Yii;
use backend\models\FlashCard;
use backend\models\FlashCardSearch;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * FlashCardController implements the CRUD actions for FlashCard model.
 */
class FlashCardController extends base\FlashCardController

{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
                // everything else is denied
            ],
        ]);
    }

    /*cách 1 dùng hàm excute sql */
    public function actionViewAllCard()
    {
        $connection = Yii::$app->getDb();
        $card = $connection->createCommand('SELECT * FROM flash_card')->queryAll();
        var_dump($card);
    }

    /* cách 2 dùng ActiveRecode*/

    public function actionViewAllFlashCard()
    {

        $id = 2;
//        $card =FlashCard::find()->asArray()->all();
        /*string format*/
        $card = FlashCard::find()->where('id=1')->all();
//        $card =FlashCard::find()->where("id=$id")->all();
        // để tránh sql injection yii hỗ trợ cách sau
        $card = FlashCard::find()->where('id=:id', [':id' => $id])->all();
//        $card =FlashCard::find()->where('id=2')->all();

        /*operator format*/
        $card = FlashCard::find()->where(['and', ['id' => 2], ['title' => 'thuật toán sắp xếp']])->all();
        var_dump($card);

        /**/

        $card = FlashCard::find()->select(['id', 'title'])->where(['id' => $id])->all();
    }

    /*Query Builder*/
    public function actionViewQueryCard()
    {
        $query = new Query();
        $query->select(['id', 'title'])
            ->from('flash_card')
            ->where(['id' => '2'])
            ->all();
    }


}
