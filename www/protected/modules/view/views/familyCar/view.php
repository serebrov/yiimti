<?php
$this->breadcrumbs=array(
	'Family Cars'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FamilyCar', 'url'=>array('index')),
	array('label'=>'Create FamilyCar', 'url'=>array('create')),
	array('label'=>'Update FamilyCar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FamilyCar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FamilyCar', 'url'=>array('admin')),
);
?>

<h1>View FamilyCar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'seats',
	),
)); ?>
