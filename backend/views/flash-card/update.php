<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FlashCard */

$this->title = 'Update Flash Card: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Flash Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="flash-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
