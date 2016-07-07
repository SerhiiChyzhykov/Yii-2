<?php
/* @var $this yii\web\View */
$this->title = 'Home';
use yii\widgets\LinkPager;
?>
<div class="content clearfix">
    <div class="container">
        <?php foreach ($models as $model):?>
            <div class="col-xs-9 col-sm-5 col-md-4 col-lg-3">
                <div class="thumbnail" >
                    <div class="caption" style = "height: 140px;" >
                        <a href='/photo?id=<?php echo $model->id;?>'>
                        <img src='<?php echo $model->images;?>' title='увеличить' style="height: 155px;">
                        </a>
                    </div>
                    <div class="caption">
                        <?php if(strlen($model->title) >= 17):?>
                            <h3><?php echo substr($model->title, 0, 17); ?>...</h3>
                        <?php else:?>
                            <h3><?php echo substr($model->title, 0, 17); ?></h3>
                        <?php endif;?>
                        <?php 
                        $rand = array('default','success','info','warning','danger'); 
                        $rand = $rand[rand(0,4)];   
                        ?>
                        <span class="label label-<?php echo $rand;?>">
                            <?php foreach ($category as $key):?>
                                <?php if($key->id == $model->category_id):?>
                                    <?php echo $key->title;?>
                                <?php endif;?>
                            <?php endforeach;?>
                        </span>
                        <br/><br/>
                        <?php if(strlen($model->description) >= 30):?>
                            <p><?php echo substr($model->description, 0, 30); ?>...</p>
                        <?php else:?>
                            <p><?php echo substr($model->description, 0, 30); ?></p>
                        <?php endif;?>
                        <p>
                            <a href='/photo?id=<?php echo $model->id;?>' class="btn btn-primary" >Full width</a>
                            <a href="/photos?user=<?php echo $model->user_id;?>" class="btn btn-default" role="button">User's album</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="navigation">
        <center>
            <?php echo LinkPager::widget(['pagination' => $pages]);?>
        </center>
    </div>
</div>
