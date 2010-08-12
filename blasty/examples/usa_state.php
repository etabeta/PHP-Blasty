<?php
  $usa_state = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming");
  reset($usa_state);
  $output = '[';
  if ($_REQUEST['query'] != '') {
    foreach ($usa_state as $key => $val) {
      if ($_REQUEST['query'] == substr($val, 0, strlen($_REQUEST['query'])) OR $_REQUEST['query'] == strtolower(substr($val, 0, strlen($_REQUEST['query'])))) {
        $output .= '"' . $val . '", ';
      }
    }
    if (strlen($output) >= 2) {
      $output = substr($output, 0, strlen($output) - 2);
    }
  }
  $output .= ']';
  echo $output;
?>