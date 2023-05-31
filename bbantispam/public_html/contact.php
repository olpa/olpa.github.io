<?php

$sname = $_SERVER['SERVER_NAME'];
$email_to   = "webmaster@${sname}";
$email_subj = "${sname} contact form is submitted";
$email_from = "webmaster@${sname}";


$msg = "POST data:\n----------\n\n";

foreach ($_POST as $key=>$value) {
  $msg = $msg . $key . '=' . $value . "\n";
}


$msg .= "\n\n\n\n\nSERVER data:\n------------\n\n";

foreach ($_SERVER as $key=>$value) {
  $msg = $msg . $key . '=' . $value . "\n";
}

mail($email_to, $email_subj, $msg, $email_from);

?>
<html>
<body>
<p>Thank you for contacting me. Please expect some delay in answering.</p>
<p><a href="/">return back</a></p>
</body>
</html>
