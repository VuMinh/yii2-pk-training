<?php

/* @var $this yii\web\View */
use backend\assets\FlashAsset;

$this->title = 'My Yii Application';
FlashAsset::register($this);
?>
<div class="site-index">
    <div class="panel panel-default ">
        <div class="panel-body">
            <div class="jumbotron">
                <div class="container">
                    <h1>Hello, world!</h1>
                    <p class="h1_config">Contents...</p>
                    <p>
                        <a class="click btn btn-primary btn-lg ">Learn more</a>
                    </p>
<!--                    <img src="../../backend/web/images/123.jpg" alt="">-->
                    <img src="<?=Yii::getAlias('@web').'/images/123.jpg'?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
