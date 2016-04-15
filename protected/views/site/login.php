<?php $this->pageTitle=Yii::app()->name . ' - Login';?>

<div class="sign-overlay"></div>
  <div class="signpanel"></div>
    
  <div class="panel signin">
      <div style="text-align: center;"><img src="<?php echo Yii::app()->baseUrl;?>/public/images/se2016.png" align="middle"/></div>
    <div class="panel-heading">
      <h4 class="panel-title">Tes Rekrutmen Petugas Entri SE2016.</h4>
    </div>
    <div class="panel-body">
        <?php if($model->hasErrors()):?>
        <div class="panel panel-danger-full">
        <?php echo CHtml::errorSummary($model, NULL, NULL,array('class'=>'panel-body', 'style'=>'padding:15px;')); ?>
        </div>
        <?php endif;?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableAjaxValidation'=>false,
        )); ?>
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder'=>'Enter Username')); ?>
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <?php echo CHtml::passwordField(CHtml::activeName($model, 'password'), '', array('class'=>'form-control', 'placeholder'=>'Enter Password')); ?>
          </div>
        </div>
        <div style="margin-top:20px;"></div>
        <div class="form-group">
            <button class="btn btn-success btn-quirk btn-block" type="submit">Log In</button>
        </div>
      <?php $this->endWidget();?>
      <hr class="invisible">
      <p style="text-align: center;color:#A5A5A5;">Copyright &copy; BPS Provinsi Kalimantan Barat</p>
    </div>
  </div><!-- panel -->