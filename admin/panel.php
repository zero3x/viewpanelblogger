<?php 
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: panel.php                                                    ***
***   Use: Include all the elements needed to display the panel              ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/
ob_start();

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
include("lib/core_theme/theme.php"); 
}
} 
} 
else 
{ 
header("Location: login.php"); 
} 
?>