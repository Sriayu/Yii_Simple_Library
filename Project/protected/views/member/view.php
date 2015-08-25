<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->id,
);


$this->menu=array(
	//array('label'=>'List Profile', 'url'=>array('index')),
	//array('label'=>'Create Profile', 'url'=>array('create')),
	array('label'=>'Update Profile', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Update Password', 'url'=>array('updatecredential')),
	//array('label'=>'Delete Profile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Profile', 'url'=>array('admin')),
);

?>

<h1>View Profile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account_id',
		'first_name',
		'last_name',
		'e_mail',
		'address',
	),
)); ?>
