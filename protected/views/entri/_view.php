<?php
/* @var $this EntriController */
/* @var $data Entri */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teks')); ?>:</b>
	<?php echo CHtml::encode($data->teks); ?>
	<br />


</div>