<?php
$this->breadcrumbs=array(
	'Loans'=>array('NotApproved'),
	$model->id,
);
?>

<h1>Gagal. </h1>
<h2> Anda telah meminjam buku ini sebelumnya.</h2>


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

