<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Baner */

$this->title = 'Create Baner';
$this->params['breadcrumbs'][] = ['label' => 'Baners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
