<?php
$this->breadcrumbs=array(
	'Family Car Datas',
);

$this->menu=array(
	array('label'=>'Create FamilyCarData', 'url'=>array('create')),
	array('label'=>'Manage FamilyCarData', 'url'=>array('admin')),
);
?>

<h1>Family Car Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
