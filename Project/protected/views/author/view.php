<?php
/* @var $this AuthorController */
/* @var $model Author */

$this->breadcrumbs = array(
    'Authors' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Author', 'url' => array('index')),
    array('label' => 'Create Author', 'url' => array('create')),
    array('label' => 'Update Author', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Author', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Author', 'url' => array('admin')),
);
?>

<h1>View Author #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'first_name',
        'last_name',
        'e_mail',
    ),
));
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'book-grid',
// set the method handling the search action & pass the author's id
    'dataProvider' => $book->searchWithAuthor($model->id),
// the object which stores filter criteria
    'filter' => $book,
// disable ajax, a normal request-response is used
    'ajaxUpdate' => false,
    'columns' => array(
        'id',
        'isbn',
        'title',
        'year',
        array(
// the field name to be shown on the table header
            'name' => 'publisher',
// $data is an alias that refers to a single row data
            'value' => '$data->publisher->name',
            // disble the searchbox for this field
            'filter' => false
        ),
    ),
));
?>