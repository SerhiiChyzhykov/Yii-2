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
        <?php $photo = $key['id'];?>
        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
            <div class="thumbnail">
                <img src='<?php echo $key['images'];?>' width="600" hight="600" />
            </div>
            <?php if (Yii::$app->user->identity->id == $key['user_id']):?>
                <form action="" method="POST" role="form" name="delete">
                    <input type="hidden" name="delete" value="{{row.id}}">
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </form>
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
                                <form action="" method="POST" role="form" enctype="multipart/form-data" name="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $key['title'];?>" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" id="description" value="<?php echo $key['description'];?>" name="description" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select  name="categories" id="input" class="form-control" required="required">
                                                <?php foreach ($cat as $value):?>
                                                  <option <?php if($value['id'] == $key['category_id']):?> selected <?php endif;?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                                              <?php endforeach;?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                        <center><img src="<?php echo $key['images'];?>" width="150" hight="150" /></center>
                                        <br>
                                        <input type="file" class="form-control" id="file" value="{{row.image}}" name="image">
                                        <input type="hidden" class="form-control" id="edit" value="{{row.id}}" name="edit">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
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
            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($post, 'post')->textInput(['maxlength' => true , 'required'=>"required"]) ?>

            <?php $user = Yii::$app->user->identity->id;?>

            <?= Html::activeHiddenInput($post, 'user_id', $options = ['value'=>$user]) ?>

            <?= Html::activeHiddenInput($post, 'photo_id', $options = ['value' => $photo]) ?>

            <div class="form-group">

               <?=  Html::submitButton($post->isNewRecord ? 'Send' : 'Update', ['class' => $post->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>

           </div>

           <?php ActiveForm::end(); ?>

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

