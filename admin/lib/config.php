<?php 
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: config.php                                                   ***
***   Use:                                                                   ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/

include('functions.php');
include('databasesettings.php');

//Variables
//These variables are not to be edited. Doing so could destroy navigation... etc.
$displayname = $_COOKIE['View_Panel_ID'];
$page = $_GET['page'];

$panelversion = "2.5 'Reality' RC1";     //The version of View Panel you are using

//Start Functions

//Connects to the database
$decryptpass = base64_decode($dbpass);
$con = mysql_connect($localdatabase, $dbuser, $decryptpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  echo "View Panel could not connect to the database. Please try again. If the problem persists please contact tech support.";
  }

//Selects the VP database
mysql_select_db($dbname) or die(mysql_error()); 

//Terminates MySQL connection
function View_Panel_MySQL_Kill() {
	mysql_close($con);
}
?>