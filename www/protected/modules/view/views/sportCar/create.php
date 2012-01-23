<?php
$this->breadcrumbs=array(
	'Sport Cars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SportCar', 'url'=>array('index')),
	array('label'=>'Manage SportCar', 'url'=>array('admin')),
);
?>

<h1>Create SportCar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>