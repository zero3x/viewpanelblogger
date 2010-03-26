<?php 
if (file_exists("../lib/registerfirst.txt")) {
    echo "You've already run this script. Doing so again could erase all users created. Please create using View Panel itself.";
} else {
	
include("../lib/databasesettings.php"); 
$decryptpass = base64_decode($dbpass);
$con = mysql_connect($localdatabase,$dbuser,$decryptpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  echo "View Panel could not connect to the database. Please try again. If the problem persists please contact tech support.";
  }
mysql_select_db($dbname) or die(mysql_error()); 

mysql_select_db($dbname, $con);
$sqlglitch = "CREATE TABLE users
(
id mediumint(9) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
username varchar(60),
password varchar(60),
email varchar(60),
firstName varchar(60),
lastName varchar(60),
rank varchar(60)
)";

mysql_query($sqlglitch,$con);
echo "Users table created";

if (isset($_POST['submit'])) { 

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
$add_member = mysql_query($insert);

mysql_close($con);

$regsiterdonefile = fopen("../lib/registerfirst.txt","w");
$surlcontent = "The first time register has been completed. DO NOT DELETE THIS FILE!";
fwrite($siteurlfile, $surlcontent);
fclose($regsiterdonefile);

echo"Registration complete. <a href='index.php?action=registerdone'>Click here</a> to continue";

} 
else 
{ 

echo"<h1>Step 4 - Make An Account</h1>";
echo"<p>This form will create an admin account so you can log into View Panel. Please fill out all the fields.</p>";
echo"<form id='form1' name='form1'  action='index.php?action=register' method='post'>";
echo"  <p>";
echo"    <label>";
echo"      1. Select a user name: ";
echo"      <input type='text' name='username' id='username' />";
echo"    </label>";
echo"  </p>";
echo"  <p>2. Select a password: ";
echo"    <label>";
echo"      <input type='password' name='password' id='password' />";
echo"    </label>";
echo"  </p>";
echo"  <p>3. Confirm the password: ";
echo"    <label>";
echo"      <input type='password' name='password2' id='password2' />";
echo"    </label>";
echo"  </p>";
echo"  <p>3. Please enter your email: ";
echo"    <label>";
echo"      <input type='text' name='email' id='email' />";
echo"    </label>";
echo"  </p>";
echo"  <p>4. Please enter your first name: ";
echo"    <label>";
echo"      <input type='text' name='firstname' id='firstname' />";
echo"    </label>";
echo"  </p>";
echo"  <p>5. Please enter your last name: ";
echo"    <label>";
echo"      <input type='text' name='lastname' id='lastname' />";
echo"    </label>";
echo"  </p>";
echo"  <p>";
echo"    <input name='rank' type='hidden' id='rank' value='1' />";
echo"  </p>";
echo"  <p>6. Click the ";
echo"    <label>";
echo"      <input type='submit' name='submit' id='submit' value='Submit' />";
echo"    </label>";
echo"    button.";
echo"  </p>";
echo"</form>";
echo"<p>&nbsp;</p>";
}
<?php 
}
}
?>