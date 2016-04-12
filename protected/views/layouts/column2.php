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

      <div class="leftpanel-userinfo collapse" id="loguserinfo">
        <h5 class="sidebar-title">Address</h5>
        <address>
          4975 Cambridge Road
          Miami Gardens, FL 33056
        </address>
        <h5 class="sidebar-title">Contact</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <label class="pull-left">Email</label>
            <span class="pull-right">me@themepixels.com</span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Home</label>
            <span class="pull-right">(032) 1234 567</span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Mobile</label>
            <span class="pull-right">+63012 3456 789</span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Social</label>
            <div class="social-icons pull-right">
              <a href="#"><i class="fa fa-facebook-official"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </li>
        </ul>
      </div><!-- leftpanel-userinfo -->

      

      <div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
            <h5 class="sidebar-title">Peserta</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk">
                <li<?php echo (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="index")?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Home</span>', array("site/index"));?></li>
                
                <li<?php echo Yii::app()->controller->id=="ujian"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Soal</span>', array("ujian/mulai"));?></li>
                <li><a href="widgets.html"><i class="fa fa-cube"></i> <span>Simulasi Entri</span></a></li>
            </ul>
            <?php if(Yii::app()->user->level_id=='1'):?>
            <h5 class="sidebar-title">Administrator</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk">
                <li<?php echo Yii::app()->controller->id=="question"?" class='active'":""; ?>><?php echo CHtml::link('<i class="fa fa-cube"></i> <span>Daftar Soal</span>', array("question/admin"));?></li>
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