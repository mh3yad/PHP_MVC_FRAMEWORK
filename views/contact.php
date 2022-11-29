<?php
use app\core\form\Form;
use app\core\Model;
?>
<?php

/**
 * @var Model $model
 */
$form = Form::start('post','/contact'); ?>
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12"><?= $form->field($model,'name');?></div>
            </div>
            <div class="row">
                <div class="col-12"><?= $form->field($model,'email')->email();?></div>
            </div>
        </div>
        <div class="col-6"><?= $form->textArea($model,'message');?></div>
    </div>
    <button class="btn btn-primary form-control">submit</button>
<?php Form::end();?>


