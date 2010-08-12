<?php
  require 'blasty/phpblasty.php';
    $data = array(
        'row1' => array('id' => 'po-0000', 'date' => '24/02/1981', 'quantity' => 1,  'amount' => 730.22, 'title' => 'A title for 1'),
        'row2' => array('id' => 'po-0168', 'date' => '25/02/1980', 'quantity' => 2,  'amount' => 118.90, 'title' => 'A title for 2'),
        'row3' => array('id' => 'po-0169', 'date' => '26/02/1980', 'quantity' => 30, 'amount' => 323.33, 'title' => 'A title for 3'),
        'row4' => array('id' => 'po-0170', 'date' => '27/02/1980', 'quantity' => 42, 'amount' => 60.11,  'title' => 'A title for 4'),
        'row5' => array('id' => 'po-0171', 'date' => '28/02/1980', 'quantity' => 5,  'amount' => 252.99, 'title' => 'A title for 5'),
    );                                  // L'array bidimensionale contenente i dati da visualizzare nella tabella
  echo phpBlasty::jsDataWrapper($data, 'fabio', 0);
?>
