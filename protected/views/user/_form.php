<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
    <div class="col-md-12">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php if($model->hasErrors()): ?>
        <div role="alert" style="" class="gritter-item-wrapper times-circle danger">
              <div class="gritter-item">
                <div class="gritter-without-image">
                  
                  <?php echo $form->errorSummary($model, '<span class="gritter-title">Perbaiki error di bawah ini!</span>'); ?>
                </div>
                <div style="clear:both"></div>
              </div>
        </div>
        <br />
        <?php endif;?>
	
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model,'kode'); ?>
                <?php echo $form->textField($model,'kode',array('class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'nama'); ?>
                <?php echo $form->textField($model,'nama',array('class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
            </div>
        </div>
        <div class="col-md-6">
            <?php if(Yii::app()->controller->action->id=='create'):?>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'value'=>'')); ?>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model,'password_confirmation'); ?>
                <?php echo $form->passwordField($model,'password_confirmation',array('class'=>'form-control', 'value'=>NULL)); ?>
            </div>
            <?php endif;?>
            <div class="form-group">
                <?php echo $form->labelEx($model,'level_id'); ?>
                <?php echo $form->dropDownList($model,'level_id',CHtml::listData(Level::model()->findAll(), 'id', 'level'),array('class'=>'form-control','prompt'=>'Pilih Level...')); ?>
            </div>
            
        </div>
        <div class="col-md-12">
            <div class="form-group">
        <br />
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->