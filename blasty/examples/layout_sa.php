<?php
  require_once '../components/layout.php';
  $layout = Layout::getInstance();

  $layout->setProperty('top', array('height' => 50, 'body' => 'top1', 'header' => 'Top', 'gutter' => '5px', 'collapse' => true, 'resize' => true));
  $layout->setProperty('right', array('header' => 'Right', 'width' => 300, 'resize' => true, 'gutter' => '5px', 'footer' => 'Footer', 'collapse' => true, 'scroll' => true, 'body' => 'right1', 'animate' => true));
  $layout->setProperty('bottom', array('header' => 'Bottom', 'height' => 100, 'resize' => true, 'body' => 'bottom1', 'gutter' => '5px', 'collapse' => true));
  $layout->setProperty('left', array('header' => 'Left', 'width' => 200, 'resize' => true, 'body' => 'left1', 'gutter' => '5px', 'collapse' => true, 'close' => true, 'collapseSize' => 50, 'scroll' => true, 'animate' => true));
?>
<html>
  <head>
    <title>Welcome to PHP Blasty: Calendar example</title>
    <link  href="../user_guide/css/user_guide.css" rel="stylesheet" type="text/css" />
    <link  href="../user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
    <?php echo $layout->yuiTags(); ?>
    <style>
      h2 {
        font-size: 12px;
      }
    </style>
  </head>
  <body class="yui-skin-sam">
    <?php echo $layout->container(); ?>
    <?php echo $layout->generate(); ?>
    <?php echo $layout->generate(); ?>
 </body>
</html>