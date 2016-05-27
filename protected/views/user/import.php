<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Import User</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'import-form',
                            'enableAjaxValidation'=>false,
                            'htmlOptions'=>array('enctype'=>'multipart/form-data')
                    )); ?>
                    
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
                    
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'file_excel'); ?>
                        <?php echo $form->fileField($model,'file_excel',array('class'=>'form-control')); ?>
                    </div>
                    <?php echo CHtml::submitButton('Import', array('class'=>'btn btn-primary')).'&nbsp;'.CHtml::link('Download Template', Yii::app()->baseUrl.'/storage/template_data_inventori.xls', array('class'=>'btn btn-primary')); ?>

                <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
            