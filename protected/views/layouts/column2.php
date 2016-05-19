<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->

      <div class="media leftpanel-profile">
        <div class="media-left">
          <a href="#">
            <img src="<?php echo Yii::app()->baseUrl;?>/public/images/photos/loggeduser.png" alt="" class="media-object img-circle">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo Yii::app()->user->username;?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
          <span><?php echo Yii::app()->user->level;?></span>
        </div>
      </div><!-- leftpanel-profile -->

      

      

      <div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
            <ul class="nav nav-pills nav-stacked nav-quirk">
                <li<?php echo (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="index")?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Home</span>', array("site/index"));?></li>
                <?php if(Yii::app()->user->level_id=='2'):?>
                <li<?php echo Yii::app()->controller->id=="ujian"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Ujian Tertulis</span>', array("ujian/mulai"));?></li>
                <li<?php echo Yii::app()->controller->id=="entri"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Ujian Entri</span>', array("entri/ujianentri"));?></li>
                <?php endif;?>
            </ul>
            <?php if(Yii::app()->user->level_id=='1'):?>
            <h5 class="sidebar-title">Administrator</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk">
                <li<?php echo Yii::app()->controller->id=="question"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Daftar Soal</span>', array("question/admin"));?></li>
                <li<?php echo Yii::app()->controller->id=="entri"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Daftar Teks Entri</span>', array("entri/admin"));?></li>
                <li<?php echo Yii::app()->controller->id=="user"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Daftar Pengguna</span>', array("user/admin"));?></li>
                <li<?php echo (Yii::app()->controller->action->id=="admin" && Yii::app()->controller->id=='ujian')?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Ujian</span>', array("ujian/admin"));?></li>
                <li<?php echo Yii::app()->controller->action->id=="nilai"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Daftar Nilai</span>', array("ujian/nilai"));?></li>
            </ul>
            <?php endif;?>
        </div><!-- tab-pane -->

        <!-- ######################## EMAIL MENU ##################### -->

        


      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

      <?php echo $content;?>

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->
<?php $this->endContent(); ?>