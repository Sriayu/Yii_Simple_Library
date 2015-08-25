<?php
/* @var $this CopyController */
/* @var $model Copy */

$this->breadcrumbs=array(
	'Copies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Copy', 'url'=>array('index')),
	array('label'=>'Manage Copy', 'url'=>array('admin')),
);
?>

<h1>Create Copy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>