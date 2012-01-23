<?php
$this->breadcrumbs=array(
	'Sport Cars',
);

$this->menu=array(
	array('label'=>'Create SportCar', 'url'=>array('create')),
	array('label'=>'Manage SportCar', 'url'=>array('admin')),
);
?>

<h1>Sport Cars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
