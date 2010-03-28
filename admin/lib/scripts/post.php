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
include("../lib/functions.php");

//GET TEH TIME!
$time_a = ($timeoffset * 120);
$posttime = date("F j, Y, g:i a",time() + $time_a);

$tablename = $_POST["page"];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$sql="INSERT INTO $tablenameclean (post, author, date)
VALUES('".$_POST[edit]."','".$_POST[author]."','".$posttime."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  echo " Please try again. If this problem persists please contact tech support. ";
  }

View_Panel_MySQL_Kill();
echo "<p>Blog post complete. Click <a href='../../login.php'>here</a> to return to the login page.</p>"
?> 