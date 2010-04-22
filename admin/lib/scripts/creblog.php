<?php 
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: creblog.php                                                  ***
***   Use: Create the blog                                                   ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/

//TODO: Instead of copying the theme make an iclude file to it.

include("../config.php");
$tablename = $_POST["tablename"];
$tabledesc = $_POST["describetable"];
$theme = $_POST["theme"];

if (!$tablename | !$tabledesc ) {
die('You did not complete all of the required fields. Please go back and try again.');
}

$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);

$sql="SELECT * FROM $tablenameclean";
$result =  @mysql_query($sql);
if ($result) {
die ("ERROR: There is already a blog of this name.");
}

$sql = "CREATE TABLE $tablenameclean
(
id mediumint(9) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
posttitle longtext,
post longtext,
author tinytext,
date longtext
)";

mysql_query($sql,$con);
echo "Your posts table has been created";

$insert = "INSERT INTO page_lister (pageName, pageDesc)
VALUES ('".$tablename."', '".$tabledesc."')";
mysql_query($insert,$con);

$insert = "INSERT INTO introductions (introduction) VALUES ('Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.') WHERE blogname='$tablenameclean'";
mysql_query($insert,$con);

View_Panel_MySQL_Kill();

//Make the base blog files
mkdir("../../../".$tablenameclean."", 0777);

//Write theme include
$infofile = "<?php
include('lib/config.php');
include('../admin/lib/config.php');
include('../admin/themes/".$theme."/theme.php');
?>";
$infofilewrite = fopen("../../../".$tablenameclean."/index.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);

//Write information file
mkdir("../../../".$tablenameclean."/lib", 0777);
$infofile = "<?php
\$blogname = '".$tablename."';
\$blogdesc = '".$tabledesc."';
\$tablenameclean = preg_replace('/[^a-zA-Z0-9]/', '', '".$tablename."');
\$tablenameclean = strtolower(\$tablenameclean);
?>";
$infofilewrite = fopen("../../../".$tablenameclean."/lib/config.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);

echo "Your blog URL is VIEWPANEL'S BASE DIRECTORY/".$tablenameclean."";
echo "<p>Blog creation complete. Click <a href='../../login.php'>here</a> to return to the login page.</p>"
?>