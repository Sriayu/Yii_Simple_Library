<?php
$this->pageTitle = Yii::app()->name . ' - Update Credential';
$this->breadcrumbs = array('UpdateCredential',);

?> 
<h1>Update Credential</h1> 
<p>Please fill out the following form to Update Your Password:</p> 

<!-- form --> 
<div class="form"> 
    <?php 
    $form = $this->beginWidget
            (
            'CActiveForm', 
            array('id' => 'registration-form', 'enableAjaxValidation' => false,)); 
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p> 
        <?php 
        echo $form->errorSummary($model); 
        ?> 
    
    <div class="row"> 
        <?php echo $form->labelEx($model, 'password'); ?> 
        <?php echo $form->passwordField($model, 'password'); ?> 
        <?php echo $form->error($model, 'password'); ?> 
    </div> 
    <div class="row"> 
        <?php  echo $form->labelEx($model, 'newpassword'); ?> 
        <?php echo $form->passwordField($model, 'newpassword');  ?> 
        <?php echo $form->error($model, 'newpassword'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'repassword');  ?> 
        <?php echo $form->passwordField($model, 'repassword');?> 
        <?php echo $form->error($model, 'repassword'); ?> 
    </div> 
    <div class="row buttons"> 
        <?php echo CHtml::submitButton('Update'); ?> 
    </div> 
        <?php $this->endWidget(); ?> 
</div>
<!-- form --