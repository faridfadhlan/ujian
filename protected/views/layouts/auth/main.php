<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title><?php echo CHtml::encode($this->pageTitle);?></title>

  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/lib/fontawesome/css/font-awesome.css">

  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/css/quirk.css">

  <script src="<?php echo Yii::app()->baseUrl;?>/public/lib/modernizr/modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body class="signwrapper">

  <?php echo $content;?>

</body>
</html>
