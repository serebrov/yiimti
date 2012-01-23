<?php
$this->breadcrumbs=array(
	'Sport Car'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SportCar', 'url'=>array('index')),
	array('label'=>'Create SportCar', 'url'=>array('create')),
	array('label'=>'View SportCar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SportCar', 'url'=>array('admin')),
);
?>

<h1>Update SportCarData <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
