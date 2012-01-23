<?php
$this->breadcrumbs=array(
	'Cars',
);

$this->menu=array(
	array('label'=>'Create Car', 'url'=>array('create')),
	array('label'=>'Manage Car', 'url'=>array('admin')),
);
?>

<h1>Cars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
