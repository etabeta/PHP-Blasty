<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome to PHP Blast YUI : PHP Blasty User Guide</title>

    <link  href="../user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
    <style type='text/css' media='all'>@import url('../user_guide/css/user_guide.css');</style>

    <link type="text/css" rel="stylesheet" href="../user_guide/css/shCore.css" />
    <link type="text/css" rel="stylesheet" href="../user_guide/css/shThemeRDark.css" />

    <script type="text/javascript" src="../user_guide/js/shCore.js"></script>
    <script type="text/javascript" src="../user_guide/js/shBrushPhp.js"></script>

    <meta http-equiv='expires' content='-1' />
    <meta http-equiv= 'pragma' content='no-cache' />
    <meta name='robots' content='all' />
    <meta name='author' content='Fabio Ingala' />
    <meta name='description' content='PHP Blasty User Guide' />

  </head>
  <body class="yui-skin-sam">
    <br /><br />
    <!-- START NAVIGATION -->
    <div id="masthead">
      <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
        <tr>
          <td><h1>PHP Blast YUI - PHP Blasty 0.1.00 Beta</h1></td>
          <td id="breadcrumb_right"><a href="http://blasty.sourceforge.net/">PHP Blasty Home</a> &nbsp;&#8250;&nbsp;<a href="blasty/user_guide/index.html">PHP Blasty User Guide</a></td>
        </tr>
      </table>
    </div>
    <!-- END NAVIGATION -->

    <!-- START BREADCRUMB -->
    <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
      <tr>
        <td id="breadcrumb">
          PHP Blasty Example start page
        </td>
        <td id="searchbox"><form method="get" action="http://www.google.com/search"><input type="hidden" name="as_sitesearch" id="as_sitesearch" value="blasty.sourceforge.net/user_guide/" />Search Blasty User Guide&nbsp; <input type="text" class="input" style="width:200px;" name="q" id="q" size="31" maxlength="255" value="" />&nbsp;<input type="submit" class="submit" name="sa" value="Go" /></form></td>
      </tr>
    </table>
    <!-- END BREADCRUMB -->

    <br clear="all" />


    <!-- START CONTENT -->
    <div id="ug-content">

      <h2>Welcome to PHP Blasty - PHP Blast YUI (YAHOO! User Interface)</h2>

      <p>PHP Blasty (PHP Blast YUI) is a YUI (YAHOO! User Interface) wrapper, based
        on PHP thats simplify the integration with YUI itself.<br />
        The aim is to let to no-javascript developer to use YUI in PHP
        application, providing a simple class called <dfn>blasty</dfn> that within few
        rows permit to use, almost, the YUI base functionality.<br />
        You need just 6 rows
        <ol>
          <li>Let PHP Blasty available in you appplication</li>
          <li>Instatiate the PHP Blasty class</li>
          <li>Load the YUI widget (eg. calendar)</li>
          <li>Include YUI in the HTML page</li>
          <li>Include the widget container in the HTML page</li>
          <li>Include the JS code to let YUI widget to work</li>
          <pre class="brush: php">
  require_once 'blasty/blasty.php';               // To gain blasty class in your php application
  $blasty = Blasty::getInstance();                // To instantiate the main blasty class
  $calendar = $blasty->loadComponent('calendar'); // To load the calendar YUI widget
  echo $blasty->yuiTags();                        // To output the HTML code that will embed YUI in the page
  echo $blasty->container('calendar');            // To output the HTML code that will contain the calendar
  echo $blasty->generate();                       // To output the JavaScript code that will render the calendar
          </pre>
        </ol>
        <p class="important"><strong>Note:</strong>
          Usually in MVC pattern the first two rows of this example have to be
          placed only one time at the beginning of the application or in the
          constructor of the controller, the third row have to be placed in the
          methods of the controller and the last three rows have to be placed in
          the view.
        </p>
      </p>
      <h2>Examples</h2>
      <p>Her are some examples.</p>

      <table width="100%">
        <tr>
          <td>
            <h3>Stand-alone</h3>
            <ul>
              <li><a href="autocomplete_local_sa.php">Autocomplete (Local)</a></li>
              <li><a href="autocomplete_remote_sa.php">Autocomplete (Remote)</a></li>
              <li><a href="calendar_sa.php">Calendar</a></li>
              <li><a href="connection_sa.php">Connection Manager</a></li>
              <li><a href="datatable_local_sa.php">Datatable (Local)</a></li>
              <li><a href="datatable_remote_sa.php">Datatable (Remote)</a></li>
              <li><a href="layout_sa.php">Layout</a></li>
            </ul>
          </td>
          <td>
            <h3>Nested</h3>
            <ul>
              <li><a href="blastyinfo.php">PHP Blasty info</a></li>
              <li><a href="autocomplete_local.php">Autocomplete (Local)</a></li>
              <li><a href="autocomplete_remote.php">Autocomplete (Remote)</a></li>
              <li><a href="calendar.php">Calendar</a></li>
              <li><a href="datatable_local.php">Datatable (Local)</a></li>
              <li><a href="datatable_remote.php">Datatable (Remote)</a></li>
              <li><a href="layout.php">Layout</a></li>
            </ul>
          </td>
        </tr>
      </table>
    </div>
    <!-- END CONTENT -->

    <div id="footer">
      <p>
        <a href="#top">Top of Page</a>
      </p>
      <p><a href="http://blasty.sourceforge.net/">PHP Blasty</a> &nbsp;&middot;&nbsp; Copyright &#169; 2010 &nbsp;&middot;&nbsp; <a href="http://fabio.ingala.it/">Fabio Ingala</a></p>
    </div>
    <script type="text/javascript">
      SyntaxHighlighter.all()
    </script>
  </body>
</html>