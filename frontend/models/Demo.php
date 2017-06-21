<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/21/2017
 * Time: 12:42 PM
 */

namespace frontend\models;


use yii\base\Model;

class Demo extends Model
{
    public $username;
    public $email;
    public $password;

   /* public function attributeLabels()
    {
        return [
            'username' =>"Họ tên: ",
            'email' =>"Email của bạn",
            'password' =>"Pass word",
        ];
    }*/

}