<?php
/* @var $this CopyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Copies',
);

if(Yii::app()->user->checkAccess('staff')){
$this->menu=array(
	array('label'=>'Create Copy', 'url'=>array('create')),
	array('label'=>'Manage Copy', 'url'=>array('admin')),
);
}
?>

<h1>Copies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
