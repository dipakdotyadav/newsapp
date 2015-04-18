<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


    <?= $form->field($model, 'news_title')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'news_content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'news_featured_image')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
