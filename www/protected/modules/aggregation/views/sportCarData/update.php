<?php
$this->breadcrumbs=array(
	'Sport Car Datas'=>array('index'),
	$model->car_id=>array('view','id'=>$model->car_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SportCarData', 'url'=>array('index')),
	array('label'=>'Create SportCarData', 'url'=>array('create')),
	array('label'=>'View SportCarData', 'url'=>array('view', 'id'=>$model->car_id)),
	array('label'=>'Manage SportCarData', 'url'=>array('admin')),
);
?>

<h1>Update SportCarData <?php echo $model->car_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>