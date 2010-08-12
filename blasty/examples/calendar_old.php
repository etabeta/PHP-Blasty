<?php
  require_once '../blasty.php';
  $cavolo = new Blasty();

  $cal = $cavolo->loadComponent('calendar');
  $cavolo->setProperty(array('navigator' => true));
  $cavolo->setProperty('PAGES', 2);

  $cavolo->loadComponent('dragdrop');
  $cavolo->dragdrop->setElementReference($cal);
?>
<html>
  <head>
    <title>Welcome to PHP Blasty: Calendar example</title>
    <link  href="../user_guide/css/user_guide.css" rel="stylesheet" type="text/css" />
    <link  href="../user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
    <?php echo $cavolo->yuiTags(YUI_CSS); ?>
  </head>
  <body class="yui-skin-sam">
    <?php echo $cavolo->container('calendar'); ?>
    <?php echo $cavolo->yuiTags(YUI_JS); ?>
    <?php echo $cavolo->generate(); ?>
  </body>
</html>