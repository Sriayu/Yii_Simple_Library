<?php
/* @var $this LoanController */
/* @var $model Loan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'borrower_id'); ?>
		<?php echo $form->textField($model,'borrower_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'borrower_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copy_id'); ?>
		<?php echo $form->textField($model,'copy_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'copy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date'); ?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'return_date'); ?>
		<?php echo $form->textField($model,'return_date'); ?>
		<?php echo $form->error($model,'return_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fines'); ?>
		<?php echo $form->textField($model,'fines'); ?>
		<?php echo $form->error($model,'fines'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->