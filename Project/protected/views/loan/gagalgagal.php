<?php
$this->breadcrumbs=array(
	'Loans'=>array('NotApproved'),
	$model->id,
);
?>

<h1>Gagal.</h1>
<h2>Anda tidak dapat meminjam buku ini karena semua copy buku sudah dipinjam / copy buku tidak ada</h2>

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

