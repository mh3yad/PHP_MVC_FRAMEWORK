<?php
use \app\core\Form\Form;
use \app\core\Model;
/**
 * @var Model $model;
 */
?>
<h1 class="text-center">Create a new account</h1>
<?php $form =  Form::begin('post') ?>


        <?= $form->field($model,'firstname')?>
        <?= $form->field($model,'lastname')?>
        <?= $form->field($model,'email')->setType('email')?>
        <?= $form->field($model,'password')->setType('password')?>
        <?= $form->field($model,'password_confirm')->setType('password')?>


<button type="submit" class="mt-2 btn btn-primary">Submit</button>
<?php Form::end() ?>


