<title>View Panel @: Saving...</title>
<?php
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: config.php                                                   ***
***   Use: Post into the blog                                                ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/
include("../config.php");

$tablename = $_POST['page'];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);
$introedit = nl2br($_POST['author']);
$introedit = mysql_real_escape_string($postauthor);
$sql="UPDATE introductions SET introduction='".$introedit."' WHERE blogname='".$tablenameclean."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  echo " Please try again. If this problem persists please contact tech support. ";
  }
View_Panel_MySQL_Kill();
echo "<p>Blog post complete. Click <a href='../../login.php'>here</a> to return to the login page.</p>";
echo $tablenameclean;
?> 