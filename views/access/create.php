<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Access */

$this->title = Yii::t('app', 'Создать доступ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Мои доступы'), 'url' => ['/access/myaccesses']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
