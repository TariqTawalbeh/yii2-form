<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\date\DatePicker;
use yii\helpers\Url;

$this->title = 'Personal Page';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Please enter the following personal information if you want to add your self to the database, note that the first 4 columns are mandatory, Have Fun!        
    </p>
    <p>
        If you want to list all persons please click <a href="<?=Url::to('index.php?r=persons/list');?>" style="text-decoration: underline;font-size:16px;">here</a>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'person-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'birth_date')->widget(DatePicker::className(), [
                    'model'=>$model,
                    'id'=>'birth_date',
                    'name' => 'birth_date',                     
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => false
                    ]
                ]) ?>

                <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save your info', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
