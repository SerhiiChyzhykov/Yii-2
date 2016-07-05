<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BanerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Config';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Baner', ['create'], ['class' => 'btn btn-success']) ?>
        
        <a href="index.php?r=config%2Fupdate&id=0" class="btn btn-success">Сhange the limit</a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'title',
        ['attribute'=>'category_id',
        'filter'=>array("1"=>"Activate","2"=>"Deactivate"),],
        ['attribute'=>'images',
        'value'=>$model->images,
        'format' => ['image',['width'=>'250','height'=>'50']],],
        [
        'label' => 'Link',
        'format' => 'raw',
        'value' => function($data){
            return Html::a(
                'Go',
                $data->user_id,
                [
                'target' => '_blank'
                ]
                );
        }
        ],

        ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>
    </div>
