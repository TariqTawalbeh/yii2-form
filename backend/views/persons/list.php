<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'People';
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [            
            'name',
            'email:email',
            'phone',
            'birth_date',
            'about',
        ],
    ]); ?>
</div>
