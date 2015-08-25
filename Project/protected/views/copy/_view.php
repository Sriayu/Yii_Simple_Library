<?php
/* @var $this CopyController */
/* @var $data Copy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->book_id), array('copy', 'id'=>$data->book_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('call_number')); ?>:</b>
	<?php echo CHtml::encode($data->call_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('availability')); ?>:</b>
	<?php echo CHtml::encode(($data->availability)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loanable')); ?>:</b>
	<?php echo CHtml::encode($data->loanable? 'Tidak Tandon' : 'Tandon'); ?>
	<br />


</div>