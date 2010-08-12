<?php
  require_once '../components/autocomplete.php';
  require_once '../components/animation.php';
  $autocomplete = Autocomplete::getInstance();
  Animation::getInstance();

  $autocomplete->setDataType('TYPE_XHR');

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
        );                                                                                         // Provide local data
?>
<html>
  <head>
    <title>Welcome to PHP Blasty: Autocomplete example</title>
    <link  href="../user_guide/css/user_guide.css" rel="stylesheet" type="text/css" />
    <link  href="../user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
    <?php echo $autocomplete->yuiTags(YUI_CSS); ?>
    <style type="text/css">
      #ac1OuterContainer {
        padding-bottom:2em;
        width:15em;
      }
    </style>
  </head>
  <body class="yui-skin-sam">
    Enter an USA state:<br />
    <?php echo $autocomplete->container(); ?>
    <?php echo $autocomplete->yuiTags(YUI_JS); ?>
    <?php echo $autocomplete->generate(); ?>
  </body>
</html>