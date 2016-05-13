<?php
/* @var $this EntriController */
/* @var $model Entri */

$this->breadcrumbs=array(
	'Entris'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Entri', 'url'=>array('index')),
	array('label'=>'Create Entri', 'url'=>array('create')),
	array('label'=>'View Entri', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Entri', 'url'=>array('admin')),
);
?>

<h1>Update Entri <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>