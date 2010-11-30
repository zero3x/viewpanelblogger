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

//GET TEH TIME!
$result = mysql_query("SELECT timeoffset FROM vpmainsettings");
	while($row = mysql_fetch_array($result)) {
		$timeoffset = $row['timeoffset'];
	}
	
$time_a = ($timeoffset * 120);
$posttime = date("F j, Y, g:i a",time() + $time_a);

$editbox = nl2br($_POST['edit']);
$editbox = mysql_real_escape_string($editbox);
$posttitle = nl2br($_POST['posttitle']);
$posttitle = mysql_real_escape_string($posttitle);
$postauthor = nl2br($_POST['author']);
$postauthor = mysql_real_escape_string($postauthor);
$tags = mysql_real_escape_string($_POST['tags']);

$tablename = $_GET["blog"];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);
echo "<p>Tablenameclean: ".$tablenameclean."</p>";
echo "Tablename: ".$tablename."</p>";
$sql="INSERT INTO test18 (posttitle, post, author, date, tags, attached_files)
VALUES('".$posttitle."','".$editbox."','".$postauthor."','".$posttime."','".$tags."','".$tags."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  echo " Please try again. If this problem persists please contact tech support. ";
  }

View_Panel_MySQL_Kill();
echo "<p>Blog post complete. Click <a href='../../login.php'>here</a> to return to the login page.</p>";
?> 