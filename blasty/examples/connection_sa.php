<?php
  require_once '../components/connection.php';
  $cavolo = Connection::getInstance();
  $cavolo->setProperty('url', 'http://developer.yahoo.com/yui/examples/connection/assets/get.php?username=anonymous&userid=0');
  $cavolo->setProperty('url', 'get.php?username=anonymous&userid=0');
  $cavolo->setCallbackProperty('success', '
    YAHOO.log("The success handler was called.  tId: " + o.tId + ".", "info", "example");

	if(o.responseText !== undefined){
		div.innerHTML = "<li>Transaction id: " + o.tId + "</li>";
		div.innerHTML += "<li>HTTP status: " + o.status + "</li>";
		div.innerHTML += "<li>Status code message: " + o.statusText + "</li>";
		div.innerHTML += "<li>HTTP headers: <ul>" + o.getAllResponseHeaders + "</ul></li>";
		div.innerHTML += "<li>Server response: " + o.responseText + "</li>";
		div.innerHTML += "<li>Argument object: Object ( [foo] => " + o.argument.foo +
						 " [bar] => " + o.argument.bar +" )</li>";
	}
');
  $cavolo->setCallbackProperty('failure', '
		YAHOO.log("The failure handler was called.  tId: " + o.tId + ".", "info", "example");

	if(o.responseText !== undefined){
		div.innerHTML = "<ul><li>Transaction id: " + o.tId + "</li>";
		div.innerHTML += "<li>HTTP status: " + o.status + "</li>";
		div.innerHTML += "<li>Status code message: " + o.statusText + "</li></ul>";
	}
');

  $cavolo->setCallbackProperty('argument', array('foo' => 'foo', 'bar' => 'bar'));
?>
<html>
  <head>
    <title>Welcome to PHP Blasty: Connection Manager example</title>
    <link  href="../user_guide/css/user_guide.css" rel="stylesheet" type="text/css" />
    <link  href="../user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
    <?php echo $cavolo->yuiTags(); ?>
  </head>
  <body class="yui-skin-sam">
    <div id="container"></div>
    <script>
      var div = document.getElementById('container');

    </script>
    <?php echo $cavolo->generate(); ?>
    <script>
      YAHOO.log("As you interact with this example, relevant steps in the process will be logged here.", "info", "example");
    </script>
 </body>
</html>