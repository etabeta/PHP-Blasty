<?php
  require_once '../components/dragdrop.php';
  require_once '../components/datatable.php';
  $dragdrop = Dragdrop::getInstance();
  $datatable = Datatable::getInstance();

  $datatable->setColumnProperty(
        array(
            'id'       => array('label' => 'ID',     'sortable' => true,  'resizeable' => true),
            'amount'   => array('label' => 'Amount', 'sortable' => true,  'resizeable' => true),
            'quantity' => array('label' => 'Q.ta',   'sortable' => true,  'resizeable' => false),
            'title'    => array('label' => 'Titolo', 'sortable' => false, 'resizeable' => true),
            )
        );
  $datatable->setProperty(array('caption' => 'Table caption', 'draggableColumns' => true));
  $datatable->setDataType('TYPE_XHR');

  $datatable->setResponseSchema(array('fields' => array("id", "date", "quantity", "amount", "title")));

  $datatable->setLiveData('data_table.data.php');                                  // Provide remote data

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Datatable stand-alone example (remote) : PHP Blasty Examples</title>

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
    <meta name='description' content='PHP Blasty Examples' />

    <?php echo $datatable->yuiTags(YUI_CSS); ?>
  </head>
  <body class="yui-skin-sam">
    <br /><br />
    <!-- START NAVIGATION -->
    <div id="masthead">
      <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
        <tr>
          <td><h1>PHP Blast YUI - PHP Blasty 0.1.00 Beta</h1></td>
          <td id="breadcrumb_right"><a href="http://blasty.sourceforge.net/">PHP Blasty Home</a> &nbsp;&#8250;&nbsp;<a href="../user_guide/index.html">PHP Blasty User Guide</a></td>
        </tr>
      </table>
    </div>
    <!-- END NAVIGATION -->

    <!-- START BREADCRUMB -->
    <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
      <tr>
        <td id="breadcrumb"><a href="index.php">PHP Blasty Example start page</a> &nbsp;&#8250;&nbsp;
          Datatable stand-alone example (remote)
        </td>
        <td id="searchbox"><form method="get" action="http://www.google.com/search"><input type="hidden" name="as_sitesearch" id="as_sitesearch" value="blasty.sourceforge.net/user_guide/" />Search Blasty User Guide&nbsp; <input type="text" class="input" style="width:200px;" name="q" id="q" size="31" maxlength="255" value="" />&nbsp;<input type="submit" class="submit" name="sa" value="Go" /></form></td>
      </tr>
    </table>
    <!-- END BREADCRUMB -->

    <br clear="all" />


    <!-- START CONTENT -->
    <div id="ug-content">

      <h1>Autocomplete stand-alone example (remote)</h1>
      <p>
      </p>
      <?php echo $datatable->container('datatable'); ?>
      <?php echo $datatable->yuiTags(YUI_JS); ?>
      <?php echo $datatable->generate(); ?>
      <h2>Complete Example code</h2>
      <pre class="brush: php">
        require_once '../components/dragdrop.php';
        require_once '../components/datatable.php';
        $dragdrop = Dragdrop::getInstance();
        $datatable = Datatable::getInstance();

        $datatable->setColumnProperty(
              array(
                  'id'       => array('label' => 'ID',     'sortable' => true,  'resizeable' => true),
                  'amount'   => array('label' => 'Amount', 'sortable' => true,  'resizeable' => true),
                  'quantity' => array('label' => 'Q.ta',   'sortable' => true,  'resizeable' => false),
                  'title'    => array('label' => 'Titolo', 'sortable' => false, 'resizeable' => true),
                  )
              );
        $datatable->setProperty(array('caption' => 'Table caption', 'draggableColumns' => true));
        $datatable->setDataType('TYPE_XHR');

        $datatable->setResponseSchema(array('fields' => array("id", "date", "quantity", "amount", "title")));

        $datatable->setLiveData('data_table.data.php');

        echo $datatable->yuiTags(YUI_CSS);
        echo $datatable->container('datatable');
        echo $datatable->yuiTags(YUI_JS);
        echo $datatable->generate();
      </pre>
    </div>
    <!-- END CONTENT -->

    <div id="footer">
      <p>
        Previous Topic:&nbsp;&nbsp;<a href="datatable_local_sa.php">Datatable stand-alone example (local)</a>
        &nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;
        <a href="#top">Top of Page</a>&nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;
        <a href="../user_guide/index.html">PHP Blasty User Guide</a>&nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;
        Next Topic:&nbsp;&nbsp;<a href="layout_sa.php">Layout stand-alone example</a>
      </p>
      <p><a href="http://blasty.sourceforge.net/">PHP Blasty</a> &nbsp;&middot;&nbsp; Copyright &#169; 2010 &nbsp;&middot;&nbsp; <a href="http://fabio.ingala.it/">Fabio Ingala</a></p>
    </div>
    <script type="text/javascript">
      SyntaxHighlighter.all()
    </script>
  </body>
</html>