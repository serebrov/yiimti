<?php
$this->breadcrumbs=array(
	'Family Cars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FamilyCar', 'url'=>array('index')),
	array('label'=>'Manage FamilyCar', 'url'=>array('admin')),
);
?>

<h1>Create FamilyCar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
