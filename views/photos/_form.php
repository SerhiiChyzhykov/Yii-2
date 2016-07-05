<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baner-form">

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

   <?= $form->field($model, 'title')->textInput(['maxlength' => true , 'required'=>"required"]) ?>

   <?= $form->field($model, 'category_id')->dropDownList($items) ?>

    <?= $form->field($model , 'file')->fileInput(['required'=>"required"]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'required'=>"required"]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'required'=>"required"]) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true, 'required'=>"required"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
