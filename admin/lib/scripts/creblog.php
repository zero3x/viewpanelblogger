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

include_once("../config.php");
$tablename = $_POST["tablename"];
$tabledesc = $_POST["describetable"];
$theme = $_POST["theme"];

if (!$tablename | !$tabledesc ) {
die('You did not complete all of the required fields. Please go back and try again.');
}

$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);

$sql = "CREATE TABLE $tablenameclean
(
id mediumint(9) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
post longtext,
author tinytext,
date longtext
)";

mysql_query($sql,$con);
echo "Your posts table has been created";

$insert = "INSERT INTO page_lister (pageName, pageDesc)
VALUES ('".$tablename."', '".$tabledesc."')";
mysql_query($insert,$con);

View_Panel_MySQL_Kill();

//Make the base blog files
mkdir("../../../".$tablenameclean."", 0777);

//$blogtemplate = file_get_contents("../../themes/".$theme."/.php");
//$blogfilewrite = fopen("../../".$tablenameclean."/post_content.php","w");
//fwrite($blogfilewrite, $blogtemplate);
//fclose($blogfilewrite);

//Copy selected theme. - Not used as of 2.4
//$source = "../../themes/blogs/".$theme."";
//$dest = "../../../".$tablenameclean."";
//copydir($source, $dest);

//Write theme include
$infofile = "<?php
include_once('lib/config.php');
include_once('../admin/themes/".$theme."/theme.php');
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
?>";
$infofilewrite = fopen("../../../".$tablenameclean."/lib/config.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);

echo "Your blog URL is VIEWPANEL'S BASE DIRECTORY/".$tablenameclean."";
echo "<p>Blog creation complete. Click <a href='../../login.php'>here</a> to return to the login page.</p>"
?>