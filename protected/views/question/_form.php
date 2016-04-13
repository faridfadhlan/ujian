<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'question'); ?>
            <?php echo $form->textArea($model,'question',array('rows'=>6, 'class'=>'wysiwyg form-control', 'style'=>'width:100%;')); ?>
            <?php echo $form->error($model,'question'); ?>
        </div>
        
	<div class="form-group">
            <?php echo $form->labelEx($model,'option_a'); ?>
            <?php echo $form->textArea($model,'option_a',array('rows'=>6, 'class'=>'wysiwyg form-control', 'style'=>'width:100%;')); ?>
            <?php echo $form->error($model,'option_a'); ?>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'option_b'); ?>
            <?php echo $form->textArea($model,'option_b',array('rows'=>6, 'class'=>'wysiwyg form-control', 'style'=>'width:100%;')); ?>
            <?php echo $form->error($model,'option_b'); ?>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'option_c'); ?>
            <?php echo $form->textArea($model,'option_c',array('rows'=>6, 'class'=>'wysiwyg form-control', 'style'=>'width:100%;')); ?>
            <?php echo $form->error($model,'option_c'); ?>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'option_d'); ?>
            <?php echo $form->textArea($model,'option_d',array('rows'=>6, 'class'=>'wysiwyg form-control', 'style'=>'width:100%;')); ?>
            <?php echo $form->error($model,'option_d'); ?>
        </div>

	<div class="form-group">
            <?php echo $form->labelEx($model,'flag_answer'); ?><br/>
            <?php echo $form->radioButtonList($model, 'flag_answer', array("a"=>"A", "b"=>"B", "c"=>"C", "d"=>"D"), array("separator"=>"&nbsp;&nbsp;&nbsp;&nbsp;"));?>
            <?php echo $form->error($model,'flag_answer'); ?>
	</div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'versi'); ?><br />
            <?php echo $form->radioButtonList($model, 'versi', array("1"=>"1", "2"=>"2"), array("separator"=>"&nbsp;&nbsp;&nbsp;&nbsp;"));?>
            <?php echo $form->error($model,'versi'); ?>
	</div>

	<div class="form-group">
            <button class="btn btn-primary">Simpan</button>
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/lib/tinymce/js/tinymce/tinymce.min.js',CClientScript::POS_END);
$cs->registerScript("tinymce", "
    tinymce.init({ 
      selector:'textarea',
      menubar: false,
      plugins: 'image,code',
      toolbar1: 'undo redo | bold italic image | alignleft aligncenter alignright alignjustify code',
      toolbar_items_size: 'small',
  });
", CClientScript::POS_END);
?>