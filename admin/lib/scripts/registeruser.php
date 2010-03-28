<?php
include("../config.php");
if (!$_POST['username'] | !$_POST['password'] | !$_POST['password2'] | !$_POST['email'] | !$_POST['firstname'] | !$_POST['lastname'] ) {
die('You did not complete all of the required fields. Please go back and try again.');
}

if (!get_magic_quotes_gpc()) {
$_POST['username'] = addslashes($_POST['username']);
}
$usercheck = $_POST['username'];
$check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
or die(mysql_error());
$check2 = mysql_num_rows($check);

if ($check2 != 0) {
die('Sorry, the username '.$_POST['username'].' is already in use.');
}

if ($_POST['password'] != $_POST['password2']) {
die('Your passwords did not match. Please go back and try again.');
}

$_POST['password'] = md5($_POST['password']);
if (!get_magic_quotes_gpc()) {
$_POST['password'] = addslashes($_POST['password']);
$_POST['username'] = addslashes($_POST['username']);
}

$insert = "INSERT INTO users (username, password, email, firstName, lastName, rank)
VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['rank']."')";
mysql_query($insert);

mysql_close($con);

echo "<p>User creation complete. Click <a href='../../login.php'>here</a> to return to the login page.</p>"

?>