<?php
/* @var $this CopyController */
/* @var $model Copy */

$this->breadcrumbs=array(
	'Copies'=>array('index'),
	$model->id,
);
if(Yii::app()->user->checkAccess('staff')){
$this->menu=array(
	array('label'=>'List Copy', 'url'=>array('index')),
	array('label'=>'Create Copy', 'url'=>array('create')),
	array('label'=>'Update Copy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Copy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Copy', 'url'=>array('admin')),
);
}
?>

<h1>View Copy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'book_id',
		'call_number',
		'year',
		'availability',
		'loanable',
	),
)); ?>
