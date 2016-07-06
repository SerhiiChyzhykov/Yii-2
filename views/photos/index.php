<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BanerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gallery';

?>
<div class="content clearfix">
    <div class="container">
        <?php foreach ($models as $model):?>
            <div class="col-xs-9 col-sm-5 col-md-4 col-lg-3">
                <div class="thumbnail" >
                    <div class="caption" style = "height: 140px;" >
                        <a href='/photo?id=<?php echo $model->id;?>'>
                            <img src='<?php echo $model->images;?>' title='увеличить'>
                        </a>
                    </div>
                    <div class="caption">
                        <?php if(strlen($model->title) >= 20):?>
                            <h3><?php echo substr($model->title, 0, 20); ?>...</h3>
                        <?php else:?>
                            <h3><?php echo substr($model->title, 0, 20); ?></h3>
                        <?php endif;?>
                        <?php 
                        $rand = array('default','success','info','warning','danger'); 
                        $rand = $rand[rand(0,4)];   
                        ?>
                        <span class="label label-<?php echo $rand;?>">
                            <?php echo $category;?>
                        </span>

                        <br/><br/>
                        <?php if(strlen($model->description) >= 30):?>
                            <p><?php echo substr($model->description, 0, 30); ?>...</p>
                        <?php else:?>
                            <p><?php echo substr($model->description, 0, 30); ?></p>
                        <?php endif;?>
                        
                        <p>
                            <a href='/photo?id=<?php echo $model->id;?>' class="btn btn-primary " >Full width</a>
                            <a href="/photos?user=<?php echo $model->user_id;?>" class="btn btn-default" role="button">User's album</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="navigation">
        <center>
            <?
            echo LinkPager::widget([
                'pagination' => $pages,
                ]);
                ?>
            </center>
        </div>
    </div>
