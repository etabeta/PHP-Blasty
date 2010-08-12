<?php
  require_once '../blasty.php';
  $cavolo = Blasty::getInstance();

  $dd = $cavolo->loadComponent('dragdrop');
  $cavolo->loadComponent('datatable');
  $dt_ref = $cavolo->getContainerId();
  $cavolo->setColumnProperty(
        array(
            'id'       => array('label' => 'ID',     'sortable' => true,  'resizeable' => true),
            'amount'   => array('label' => 'Amount', 'sortable' => true,  'resizeable' => true),
            'quantity' => array('label' => 'Q.ta',   'sortable' => true,  'resizeable' => false),
            'title'    => array('label' => 'Titolo', 'sortable' => false, 'resizeable' => true),
            )
        );
    //$cavolo->setProperty(array('caption' => 'Table caption', 'draggableColumns' => true));
  $data = array(
      'row1' => array('id' => 'po-0000', 'date' => '24/02/1981', 'quantity' => 1,  'amount' => 730.22, 'title' => 'A title for 1'),
      'row2' => array('id' => 'po-0168', 'date' => '25/02/1980', 'quantity' => 2,  'amount' => 118.90, 'title' => 'A title for 2'),
      'row3' => array('id' => 'po-0169', 'date' => '26/02/1980', 'quantity' => 30, 'amount' => 323.33, 'title' => 'A title for 3'),
      'row4' => array('id' => 'po-0170', 'date' => '27/02/1980', 'quantity' => 42, 'amount' => 60.11,  'title' => 'A title for 4'),
      'row5' => array('id' => 'po-0171', 'date' => '28/02/1980', 'quantity' => 5,  'amount' => 252.99, 'title' => 'A title for 5'),
  );                                  // L'array bidimensionale contenente i dati da visualizzare nella tabella

  $cavolo->setLocalData($data);

?>
<html>
  <head>
    <title>Welcome to PHP Blasty: Data Table example</title>
    <link  href="../user_guide/css/user_guide.css" rel="stylesheet" type="text/css" />
    <link  href="../user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
    <?php echo $cavolo->yuiTags(YUI_CSS); ?>
    <style type="text/css">
      #ac1OuterContainer {
        padding-bottom:2em;
        width:15em;
      }
    </style>
  </head>
  <body class="yui-skin-sam">
    <?php echo $cavolo->container('datatable'); ?>
    <?php echo $cavolo->yuiTags(YUI_JS); ?>
    <?php echo $cavolo->generate(); ?>
  </body>
</html>