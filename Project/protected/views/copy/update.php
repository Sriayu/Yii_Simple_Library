<?php
/* @var $this CopyController */
/* @var $model Copy */

$this->breadcrumbs=array(
	'Copies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Copy', 'url'=>array('index')),
	array('label'=>'Create Copy', 'url'=>array('create')),
	array('label'=>'View Copy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Copy', 'url'=>array('admin')),
);
?>

<h1>Update Copy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>