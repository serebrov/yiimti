<?php
$this->breadcrumbs=array(
	'Family Cars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FamilyCar', 'url'=>array('index')),
	array('label'=>'Create FamilyCar', 'url'=>array('create')),
	array('label'=>'View FamilyCar', 'url'=>array('view', 'id'=>$model->car_id)),
	array('label'=>'Manage FamilyCar', 'url'=>array('admin')),
);
?>

<h1>Update FamilyCarData <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
