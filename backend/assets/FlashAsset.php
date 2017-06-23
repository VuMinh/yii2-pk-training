<?php
/**
 * Created by PhpStorm.
 * User: MinhVT
 * Date: 6/23/2017
 * Time: 2:45 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

class FlashAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/demo.css',
    ];
    public $js = [
        'js/demo.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}