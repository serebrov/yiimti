<?php
$this->breadcrumbs=array(
	'Family Car Datas'=>array('index'),
	$model->car_id=>array('view','id'=>$model->car_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FamilyCarData', 'url'=>array('index')),
	array('label'=>'Create FamilyCarData', 'url'=>array('create')),
	array('label'=>'View FamilyCarData', 'url'=>array('view', 'id'=>$model->car_id)),
	array('label'=>'Manage FamilyCarData', 'url'=>array('admin')),
);
?>

<h1>Update FamilyCarData <?php echo $model->car_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>