<?php
$this->breadcrumbs=array(
	'Loans'=>array('NotApproved'),
	$model->id,
);
?>

<h1>Anda berhasil meminjam buku ini.</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'author_id',
		'publisher_id',
		'isbn',
		'title',
		'year',
		'description',
	),
)); ?>

