<?php
/* @var $this yii\web\View */
$this->title = 'Home';
use yii\widgets\LinkPager;
?>
<div class="content clearfix">
    <div class="container">
        <?php foreach ($models as $model):?>
            <div class="col-xs-9 col-sm-5 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <a href='/photo/<?php echo $model->id;?>'>
                        <img src='<?php echo $model->images;?>' width="400" hight="400" title='увеличить'>
                    </a>
                    <div class="caption">
                        <h3><?php echo $model->title;?></h3>
                        <?php 
                        $rand = array('default','success','info','warning','danger'); 
                        $rand = $rand[rand(0,4)];   
                        ?>
                        <span class="label label-<?php echo $rand;?>">
                            <?php echo $model->category_id;?>
                        </span>

                        <br/><br/>
                        <p><?php echo $model->description;?></p>
                        <p>
                            <a href='/photo/<?php echo $model->id;?>' class="btn btn-primary " >Full width</a>
                            <a href="/gallery?user=<?php echo $model->user_id;?>" class="btn btn-default" role="button">User's album</a>
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
