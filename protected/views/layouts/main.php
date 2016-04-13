<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

    <title>Quirk Responsive Admin Templates</title>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/lib/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/css/quirk.css">

    <script src="<?php echo Yii::app()->baseUrl;?>/public/lib/modernizr/modernizr.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../lib/html5shiv/html5shiv.js"></script>
    <script src="../lib/respond/respond.src.js"></script>
    <![endif]-->
</head>

<body>

<header>
    <div class="headerpanel">

    <div class="logopanel">
        <h2><a href="index.html">Tes Rekrutmen</a></h2>
    </div><!-- logopanel -->

    <div class="headerbar">

      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-logged" data-toggle="dropdown">
                <img src="<?php echo Yii::app()->baseUrl;?>/public/images/photos/loggeduser.png" alt="" />
                <?php echo Yii::app()->user->nama;?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li><?php echo CHtml::link('<i class="glyphicon glyphicon-log-out"></i> Log Out', array("site/logout"));?></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </div><!-- header-right -->
    </div><!-- headerbar -->
    </div><!-- header-->
</header>

<section>

  <?php echo $content;?>

</section>




<?php
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/lib/bootstrap/js/bootstrap.js',CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/js/quirk.js',CClientScript::POS_END);
?>

</body>
</html>
