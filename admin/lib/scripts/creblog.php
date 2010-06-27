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

$insert = "INSERT INTO introductions (blogname) VALUES ('".$tablenameclean."')";
mysql_query($insert,$con);

$insert = "INSERT INTO introductions (introduction) VALUES ('Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.') WHERE blogname='$tablenameclean'";
$insert ="UPDATE introductions SET introduction='Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.' WHERE blogname='$tablenameclean'";
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

$url_facebook_parse = "../../../$tablenameclean/index.php";
echo "<p>Blog Created! Click <a href='../../../$tablenameclean/'>here</a> to view it.</p>";
echo "<p>And why not start sharing your blog with your facebook friends? <a name='fb_share' type='button' share_url='".$url_facebook_parse."' href='http://www.facebook.com/sharer.php'>Share</a><script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script></p>";
echo "Or you could just go back to the <a href='../../login.php'>login</a> page.";
?>