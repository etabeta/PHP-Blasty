<?php
?>
<?php
  require_once '../phploader/loader.php';
  $obj1 = new YAHOO_util_Loader('2.8.0r4');
  $obj2 = new YAHOO_util_Loader('2.8.0r4');
  $obj3 = new YAHOO_util_Loader('2.8.0r4');
  $obj4 = new YAHOO_util_Loader('2.8.0r4');
  $obj5 = new YAHOO_util_Loader('2.8.0r4');
?>
<?php $obj1->load('calendar', 'dragdrop'); ?>

Script<br />
<?php echo $obj1->css(); ?><br /><br />
<?php echo $obj1->script(); ?><br /><br />

Sorted<br />
<?php print_r($obj1->sorted); ?><br /><br />

Script embed<br />
<?php $obj2->load('calendar', 'dragdrop'); ?>
<?php echo $obj2->script_embed(); ?><br /><br />

Script data<br />
<?php $obj3->load('calendar', 'dragdrop'); ?>
<?php print_r($obj3->script_data()); ?><br /><br />

Script json<br />
<?php $obj4->load('calendar', 'dragdrop'); ?>
<?php echo $obj4->script_json(); ?><br /><br />

Script raw<br />
<?php $obj5->load('calendar', 'dragdrop'); ?>
<?php echo $obj5->script_raw(); ?><br /><br />

<?php
require 'blasty/phpblasty.php';
foreach (phpBlasty::$yui_component as $key => $val) {
  if (phpBlasty::$yui_component[$key]['type'] == 'utility') {
    echo "'<li><a href=\"'+base+'components/$key.html\"";
    echo " class=\"tbd\"";
    echo ">".phpBlasty::$yui_component[$key]['name']."</a></li>' +\n";
  }
}