<?php
$this->breadcrumbs=array(
	'Family Cars',
);

$this->menu=array(
	array('label'=>'Create FamilyCar', 'url'=>array('create')),
	array('label'=>'Manage FamilyCar', 'url'=>array('admin')),
);
?>

<h1>Family Cars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
