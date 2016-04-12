<?php
/* @var $this QuestionController */
/* @var $data Question */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_a')); ?>:</b>
	<?php echo CHtml::encode($data->option_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_b')); ?>:</b>
	<?php echo CHtml::encode($data->option_b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_c')); ?>:</b>
	<?php echo CHtml::encode($data->option_c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_d')); ?>:</b>
	<?php echo CHtml::encode($data->option_d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag_answer')); ?>:</b>
	<?php echo CHtml::encode($data->flag_answer); ?>
	<br />


</div>