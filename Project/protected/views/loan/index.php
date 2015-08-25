<?php
/* @var $this LoanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Loans',
);
if(Yii::app()->user->checkAccess('staff')){
$this->menu=array(
	array('label'=>'Create Loan', 'url'=>array('create')),
	array('label'=>'Approval', 'url'=>array('admin')),
);
}
?>

<h1>Loans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
