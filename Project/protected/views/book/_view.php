<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::encode($data->id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?>
    <br />  
    
    <div class="row buttons"> 
        <?php  
        echo CHtml::link('Borrow', array('loan/PinjamBuku', 'book_id'=>$data->id)); ?> 
    </div>
</div> 
