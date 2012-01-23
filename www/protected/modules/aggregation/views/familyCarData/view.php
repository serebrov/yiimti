<?php
$this->breadcrumbs=array(
	'Family Car Datas'=>array('index'),
	$model->car_id,
);

$this->menu=array(
	array('label'=>'List FamilyCarData', 'url'=>array('index')),
	array('label'=>'Create FamilyCarData', 'url'=>array('create')),
	array('label'=>'Update FamilyCarData', 'url'=>array('update', 'id'=>$model->car_id)),
	array('label'=>'Delete FamilyCarData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->car_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FamilyCarData', 'url'=>array('admin')),
);
?>

<h1>View FamilyCarData #<?php echo $model->car_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'car_id',
		'seats',
	),
)); ?>
