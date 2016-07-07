<?php
for ($i = 1; $i <= 4; $i++):

    $r = rand(1,$cat_id);

$rand = array('success', 'info','warning', 'danger' );
$rand = $rand[rand(0,3)];

foreach ($cat as $s) :
 if($s['id'] == $r):?>
<div class="panel panel-<?= $rand;?>">
    <div class="panel-heading">
        <a href="category?id=<?php echo $s['id'];?>" class="color">
            <h3 class="panel-title">
                Category <?php echo $s['title'];?>
            </h3>
        </a>
    </div>
    <div class="panel-body">
        <?php foreach ($photo as $keys):?>
            <?php if($keys['category_id'] == $s['id']):?>
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <a href ="/photo?id=<?php echo $keys['id'];?>"><img src='<?php echo $keys['images'];?>' width="300" hight="300" /></a>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>
<?php endif;
endforeach;
endfor;?>
