<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photos */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Photo';
?>
<?php if($messages):?>
    <div class="messages">
        <?php foreach ($messages as $key => $value):?>
            <div class="alert alert-<?php echo $key;?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php echo $value;?></strong>
            </div>
        <?php endforeach;?>
    </div>
<?php endif;?>
<div class="row">
    <div class="col-xs-1 col-sm-1 col-md-1 ">
    </div>
    <?php foreach ($model as $key):?>
        <?php $photo_id = $key['id'];?>
        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
            <div class="thumbnail">
                <img src='<?php echo $key['images'];?>' width="600" hight="600" />
            </div>
            <?php if (Yii::$app->user->identity->id == $key['user_id']):?>
                <?= Html::a('Delete', ['delete', 'id' => $key['id']], [
                    'class' => 'btn btn-danger',
                    'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    ],
                    ]) ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" style="float: right; margin-left: 5px;">
                        Eddit
                    </button>
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            &times;
                                        </span>
                                    </button>
                                    <h4 class="modal-title">Eddit</h4>
                                </div>

                                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                                <div class="modal-body"> 
                                    <?= $form->field($photo, 'title')->textInput(['maxlength' => true , 'required'=>"required", 'value'=>$key['title']]) ?>

                                    <?= $form->field($photo, 'description')->textInput(['maxlength' => true, 'required'=>"required", 'value'=>$key['description']]) ?>

                                    <?= $form->field($photo, 'category_id')->dropDownList($items) ?>

                                    <?= $form->field($photo , 'file')->fileInput(['value'=>$key['images']]) ?>

                                    <? $user = Yii::$app->user->identity->id;?>

                                    <?= Html::activeHiddenInput($photo, 'user_id', $options = ['value'=>$user]) ?>

                                    <?= Html::activeHiddenInput($photo, 'date', $options = ['value' => date('Y-m-d')]) ?>
                                </div>
                                <div class="modal-footer">
                                  <?= Html::submitButton($photo->isNewRecord ? 'Create' : 'Update', ['class' => $photo->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              <?php ActiveForm::end(); ?>
                          </div>
                      </div>
                  </div>
              <?php endif; ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $key['title'];?></h3>
                </div>
                <div class="panel-body">
                   <?php echo $key['description'];?>
               </div>
           </div>
       </div>
   <?php endforeach;?>
   <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Comment form</h3>
        </div>
        <div class="panel-body">
            <div class="modal-body">
            <?php $forms = ActiveForm::begin() ?>

                <?= $forms->field($post, 'post')->textInput(['maxlength' => true , 'required'=>"required"]) ?>

                <?php $user = Yii::$app->user->identity->id;?>

                <?= Html::activeHiddenInput($post, 'user_id', $options = ['value'=>$user]) ?>

                <?= Html::activeHiddenInput($post, 'photo_id', $options = ['value' => $photo_id]) ?>

                <div class="form-group">

                 <?=  Html::submitButton($post->isNewRecord ? 'Send' : 'Update', ['class' => $post->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>

             </div>

             <?php ActiveForm::end(); ?>
         </div>
     </div>
 </div>
 <div class="panel-group" >
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Last comments</h3>
        </div>
        <div class="panel-body">
            <?php foreach ($comments as $row):?>
                <p>
                    <?php $rand = array('default','primary','success','info','warning','danger');?>
                    <?php $rand = $rand[rand(0,5)];?>
                    <span class="label label-<?php echo $rand;?> text-capitalize">
                     <?php echo $username;?>
                 </span>
                 <div class="world">
                     <?php echo $row['post'];?>
                 </div>
             </p>
         <?php endforeach;?>
     </div>
 </div>
</div>
</div>
</div>

