<?php
$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array(
    'Register',
);
?>
<h1>Register</h1>
<p>Please fill out the following form to register:</p>
<!-- form -->
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registration-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are
        required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name'); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name'); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textField($model, 'address'); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'e_mail'); ?>
        <?php echo $form->textField($model, 'e_mail'); ?>
        <?php echo $form->error($model, 'e_mail'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'repassword'); ?>
        <?php echo $form->passwordField($model, 'repassword'); ?>
        <?php echo $form->error($model, 'repassword'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Register'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->