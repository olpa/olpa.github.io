<?php
//
// Keygen for phpBBantispam
// Parameters:
//   p:  password
//   s:  server name
// Returns:
//   PHP code which sets variables $lic_server and $lic_key
// Algorithm:
//   Delete spaces (' '), commas (',') and letters 'w' from the
//   server name. Take md5 from the result.
//   Reason: it's possible to use trim() instead of deleting
//   spaces, but I decided to use an uniform approach. A key for
//   'server.com' and 'www.server.com' should be the same. The
//   simplest approach is to delete 'www.'.
//

$password = $_GET['p'];
$server   = $_GET['s'];
$is_atc   = isset($_GET['mode']) and ($_GET['mode'] == 'atc');

//
// Check the password
//
if ('dfjk3k4' != $password) {
  header('HTTP/1.0 401 Unauthorized');
  die('wrong password');
}

//
// Calculate the key
//
$server2 = strtr(strtolower($server), array(' ' => '', '.' => '', 'w' => ''));
$key = md5($server2);

//
// Generate a license file
//
header("Content-type: text/plain");
if ($is_atc) {
echo <<<EOT
-----
The license key for the server "$server" is:

$key

How to apply the key:

1) Open the file "bbas_config.php"

2) Find the string

\$license_key = '00000000';

3) Change the string to

\$license_key = '$key';

4) Save the file.
-----
EOT;
} else {
echo <<<EOT
<?php
// License key for the bbAntiSpam tools
// * Links Rejector <http://bbantispam.com/lr/> and
// * Textual Confirmation <http://bbantispam.com/tc/>.
//
// This file should be named "bbantispam.key". Place this file in
// the folder "includes" under the phpBB installation directory.
//
\$lic_server  = '$server';
\$lic_key     = '$key';
//
// Set to 1 to get notifications about spam
\$bbas_notify = 0; // bbAntiSpam
\$tc_notify   = 0; // Textual Confirmation
?>
EOT;
}

?>
