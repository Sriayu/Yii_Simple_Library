<?php
/* @var $this PublisherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publishers',
);

if(Yii::app()->user->checkAccess('staff')){
$this->menu=array(
	array('label'=>'Create Publisher', 'url'=>array('create')),
	array('label'=>'Manage Publisher', 'url'=>array('admin')),
);
}
?>

<h1>Publishers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
