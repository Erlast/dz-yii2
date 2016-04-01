<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Access */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="access-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'user_guest')->textInput() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(),['language'=>'ru','options' => ['dateFormat'=>'yyyy-mm-dd']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
