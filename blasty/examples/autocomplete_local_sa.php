<?php
  require_once '../components/autocomplete.php';
  require_once '../components/animation.php';

  $autocomplete = Autocomplete::getInstance();
  Animation::getInstance();

  $autocomplete->setDataType('TYPE_LOCAL');
  $autocomplete->setLiveData(
        array(
            'Alabama',        'Alaska',         'Arizona',        'Arkansas',
            'California',     'Colorado',       'Connecticut',    'Delaware',
            'Florida',        'Georgia',        'Hawaii',         'Idaho',
            'Illinois',       'Indiana',        'Iowa',           'Kansas',
            'Kentucky',       'Louisiana',      'Maine',          'Maryland',
            'Massachusetts',  'Michigan',       'Minnesota',      'Mississippi',
            'Missouri',       'Montana',        'Nebraska',       'Nevada',
            'New Hampshire',  'New Jersey',     'New Mexico',     'New York',
            'North Dakota',   'North Carolina', 'Ohio',           'Oklahoma',
            'Oregon',         'Pennsylvania',   'Rhode Island',   'South Carolina',
            'South Dakota',   'Tennessee',      'Texas',          'Utah',
            'Vermont',        'Virginia',       'Washington',     'West Virginia',
            'Wisconsin',      'Wyoming',
            )
        );                                                                      // Provide local data

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Autocomplete stand-alone example (local) : PHP Blasty Examples</title>

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

    <?php echo $autocomplete->yuiTags(YUI_CSS); ?>
    <style type="text/css">
      #ac1OuterContainer {
        padding-bottom:2em;
        width:15em;
      }
    </style>
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
          Autocomplete stand-alone example (local)
        </td>
        <td id="searchbox"><form method="get" action="http://www.google.com/search"><input type="hidden" name="as_sitesearch" id="as_sitesearch" value="blasty.sourceforge.net/user_guide/" />Search Blasty User Guide&nbsp; <input type="text" class="input" style="width:200px;" name="q" id="q" size="31" maxlength="255" value="" />&nbsp;<input type="submit" class="submit" name="sa" value="Go" /></form></td>
      </tr>
    </table>
    <!-- END BREADCRUMB -->

    <br clear="all" />


    <!-- START CONTENT -->
    <div id="ug-content">

      <h1>Autocomplete stand-alone example (local)</h1>
      <p>
      </p>
      Enter an USA state:<br />
      <?php echo $autocomplete->container('autocomplete'); ?>
      <?php echo $autocomplete->yuiTags(YUI_JS); ?>
      <?php echo $autocomplete->generate(); ?>
      <h2>Complete Example code</h2>
      <pre class="brush: php">
        require_once '../components/autocomplete.php';
        require_once '../components/animation.php';

        $autocomplete = Autocomplete::getInstance();
        Animation::getInstance();

        $autocomplete->setDataType('TYPE_LOCAL');
        $autocomplete->setLiveData(
              array(
                  'Alabama',        'Alaska',         'Arizona',        'Arkansas',
                  'California',     'Colorado',       'Connecticut',    'Delaware',
                  'Florida',        'Georgia',        'Hawaii',         'Idaho',
                  'Illinois',       'Indiana',        'Iowa',           'Kansas',
                  'Kentucky',       'Louisiana',      'Maine',          'Maryland',
                  'Massachusetts',  'Michigan',       'Minnesota',      'Mississippi',
                  'Missouri',       'Montana',        'Nebraska',       'Nevada',
                  'New Hampshire',  'New Jersey',     'New Mexico',     'New York',
                  'North Dakota',   'North Carolina', 'Ohio',           'Oklahoma',
                  'Oregon',         'Pennsylvania',   'Rhode Island',   'South Carolina',
                  'South Dakota',   'Tennessee',      'Texas',          'Utah',
                  'Vermont',        'Virginia',       'Washington',     'West Virginia',
                  'Wisconsin',      'Wyoming',
                  )
              );

        echo $autocomplete->yuiTags(YUI_CSS);
        echo 'Enter an USA state:<br />';
        echo $autocomplete->container('autocomplete');
        echo $autocomplete->yuiTags(YUI_JS);
        echo $autocomplete->generate();
      </pre>
    </div>
    <!-- END CONTENT -->

    <div id="footer">
      <p>
        Previous Topic:&nbsp;&nbsp;<a href="index.php">PHP Blasty Example start page</a>
        &nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;
        <a href="#top">Top of Page</a>&nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;
        <a href="../user_guide/index.html">PHP Blasty User Guide</a>&nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;
        Next Topic:&nbsp;&nbsp;<a href="autocomplete_remote_sa.php">Autocomplete stand-alone example (remote)</a>
      </p>
      <p><a href="http://blasty.sourceforge.net/">PHP Blasty</a> &nbsp;&middot;&nbsp; Copyright &#169; 2010 &nbsp;&middot;&nbsp; <a href="http://fabio.ingala.it/">Fabio Ingala</a></p>
    </div>
    <script type="text/javascript">
      SyntaxHighlighter.all()
    </script>
  </body>
</html>