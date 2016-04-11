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
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/lib/weather-icons/css/weather-icons.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/lib/jquery-toggles/toggles-full.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/lib/jquery.steps/jquery.steps.css">

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
                Muhammad Farid Fadhlan
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li><a href="signin.html"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
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

<script src="<?php echo Yii::app()->baseUrl;?>/public/lib/jquery/jquery.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/public/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/public/lib/jquery-toggles/toggles.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/public/lib/jquery.steps/jquery.steps.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/public/lib/jquery-validate/jquery.validate.js"></script>

<script src="<?php echo Yii::app()->baseUrl;?>/public/js/quirk.js"></script>
<script>

$(document).ready(function() {
    'use strict';
  $('#wizard-basic, #wizard-basic2').steps({
    headerTag: 'h3',
    bodyTag: 'div',
    transitionEffect: 'slideLeft',
    autoFocus: true
  });
});
</script>

</body>
</html>
