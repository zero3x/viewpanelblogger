<?php 

/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: login.php                                                    ***                                             
***   Use: Login to View Panel                                               ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/
$installcomp = file_exists("lib/installcomplete.txt");
if (!$installcomp) {
    ?>
    <p>View Panel does not appear to be installed. If you know you have installed it please <a href="help/bugsanderrors.php#q1">click here</a> for some support. If you need to install it please <a href="install/index.php">click here</a>.</p>
   
    
	<?php
}

include("lib/config.php"); 
if (function_exists("filechecker_enabled")) {
	filechecker_enabled();
}



if(isset($_COOKIE['View_Panel_ID'])) {
	$username = $_COOKIE['View_Panel_ID']; 
    $pass = $_COOKIE['View_Panel_Key'];
    $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check )) {
       if ($pass != $info['password']) {
         } else {
             header("Location: panel.php?page=home");
			 }
			 }
			 }
			 
if (isset($_POST['submit'])) {
	if(!$_POST['username'] | !$_POST['pass']) {
       die('You did not fill in a required field.');
    }
	//Prevent injection 
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['pass']);

    $check = mysql_query("SELECT * FROM users WHERE username = '".$username."'")or die(mysql_error());
	$check2 = mysql_num_rows($check);
    if ($check2 == 0) {
      die('User does not exist.');
        }
    while($info = mysql_fetch_array( $check )) 
    {
    $password = stripslashes($password);
    $info['password'] = stripslashes($info['password']);
    $password = md5($password);
    if ($password != $info['password']) {
       die('Incorrect password.');
    }
	
else 
{
$username = stripslashes($username); 
$hour = time() + 3600; 
setcookie("View_Panel_ID", $username, $hour, "/"); 
setcookie("View_Panel_Key", $password, $hour, "/"); 

header("Location: panel.php?page=home"); 
} 
} 
} 
else 
{ 
?> 

<body>
<p>To use View Panel please login.</p>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" >
  <p>
    <label>
      Username: 
      <input name="username" type="text" id="username" maxlength="15" />
    </label>
  </p>
  <p>
    <label>
      Password: 
      <input name="pass" type="password" id="pass" maxlength="15" />
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="submit" id="submit" value="Submit" />
    </label>
  </p>
</form>
<p>&nbsp;</p>
</body>
<?php
}
?>
</html>