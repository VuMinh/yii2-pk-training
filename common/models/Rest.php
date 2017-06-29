<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/26/2017
 * Time: 4:34 PM
 */

namespace common\models;
use Yii;
use yii\db\ActiveRecord;


class Rest extends ActiveRecord
{
    public static function tableName()
    {
        return 'flash_card';
    }
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

}