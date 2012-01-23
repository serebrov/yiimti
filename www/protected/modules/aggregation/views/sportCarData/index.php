<?php
$this->breadcrumbs=array(
	'Sport Car Datas',
);

$this->menu=array(
	array('label'=>'Create SportCarData', 'url'=>array('create')),
	array('label'=>'Manage SportCarData', 'url'=>array('admin')),
);
?>

<h1>Sport Car Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
