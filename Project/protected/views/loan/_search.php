<?php
/* @var $this LoanController */
/* @var $model Loan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'borrower_id'); ?>
		<?php echo $form->textField($model,'borrower_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copy_id'); ?>
		<?php echo $form->textField($model,'copy_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'return_date'); ?>
		<?php echo $form->textField($model,'return_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fines'); ?>
		<?php echo $form->textField($model,'fines'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->