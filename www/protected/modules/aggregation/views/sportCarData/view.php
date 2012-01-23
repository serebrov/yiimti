<?php
$this->breadcrumbs=array(
	'Sport Car Datas'=>array('index'),
	$model->car_id,
);

$this->menu=array(
	array('label'=>'List SportCarData', 'url'=>array('index')),
	array('label'=>'Create SportCarData', 'url'=>array('create')),
	array('label'=>'Update SportCarData', 'url'=>array('update', 'id'=>$model->car_id)),
	array('label'=>'Delete SportCarData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->car_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SportCarData', 'url'=>array('admin')),
);
?>

<h1>View SportCarData #<?php echo $model->car_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'car_id',
		'power',
	),
)); ?>
