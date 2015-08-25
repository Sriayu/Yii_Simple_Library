<?php
/* @var $this LoanController */
/* @var $data Loan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('borrower_id')); ?>:</b>
	<?php echo CHtml::encode($data->borrower_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copy_id')); ?>:</b>
	<?php echo CHtml::encode($data->copy_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('return_date')); ?>:</b>
	<?php echo CHtml::encode($data->return_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fines')); ?>:</b>
	<?php echo CHtml::encode($data->fines); ?>
	<br />
        
        <?php
        echo ($data->approval? "Terima" : CHtml::link("Batal", Array('Loan/Batal', 'id'=>$data->id)) );
//         echo CHtml::link("Batal", array('Loan/Batal', 'id'=>$data->id)); 
        ?> 


</div>