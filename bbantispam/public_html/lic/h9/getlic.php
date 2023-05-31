<?php

$p = $_POST['h9code'];
if (! (isset($p) and ($p == 'h9iAexa'))) {
  die("Bad Hakin9 code");
}

$s = $_POST['server_name'];
if (! isset($s)) {
  die("No server name");
}

$time_closed = strtotime("10 November 2008");
$time_now    = mktime();
if ($time_now > $time_closed) {
  die("Promotion is closed 1 November 2008.");
}

ob_start();
$_GET['p']    = 'dfjk3k4';
$_GET['s']    = $s;
$_GET['mode'] = 'atc';
require('../../bbas_keygen.php');
$s = ob_get_contents();
ob_end_clean();
print $s;

ob_start();
print $s . "\n\n";
print_r($_REQUEST);
print_r($_SERVER);
$s = ob_get_contents();
ob_end_clean();
mail('info@bbantispam.com', 'h9 license request', $s);

?>
