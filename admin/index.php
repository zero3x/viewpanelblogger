<?php

/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: index.php                                                    ***                                             
***   Use: Check cookies. Loads panel or login .php                          ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/
if (file_exists("lib/installcomplete.txt")) {

include("lib/config.php");

if(isset($_COOKIE['View_Panel_ID'])) 
{ 
$username = $_COOKIE['View_Panel_ID']; 
$pass = $_COOKIE['View_Panel_Key']; 
$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 
while($info = mysql_fetch_array( $check )) 
{ 
if ($pass != $info['password']) 
{ header("Location: login.php"); 
} 
else 
{ 
header("Location: panel.php?page=home");
}
} 
} 
else 
{ 
header("Location: login.php"); 
} 
}
else
{
	?>
	<p>View Panel does not appear to be installed at all! If you know you have installed it please <a href="help/index.php#q1">click here</a> for some support. If you need to install it please <a href="install/index.php">click here</a>.</p>
    <?php
}
?>
