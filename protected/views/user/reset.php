<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Reset Password User</h3>
            </div>
              <div class="panel-body">
                  <div class="form">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'reset-form',
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'password'); ?>
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'password_confirmation'); ?>
                                    <?php echo $form->passwordField($model,'password_confirmation',array('class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            
                                

                    <?php $this->endWidget(); ?>

                    </div><!-- form -->
              </div>
          </div>
    </div>
</div>