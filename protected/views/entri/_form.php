<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entri-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model,'b4k2'); ?>
                <?php echo $form->textField($model,'b4k2',array('class'=>'form-control')); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model,'b4k3'); ?>
                <?php echo $form->textField($model,'b4k3',array('class'=>'form-control')); ?>
            </div>
        </div>    
        </div>
        <div class="col-md-4">    
            <div class="form-group">
                <?php echo $form->labelEx($model,'b4k5'); ?>
                <?php echo $form->textField($model,'b4k5',array('class'=>'form-control')); ?>
            </div>
        </div>   
        <div class="col-md-12"> 
	<div class="form-group">
            <button class="btn btn-primary">Simpan</button>
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->