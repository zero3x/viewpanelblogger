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
$tablename = addslashes($tablename);
$tabledesc = addslashes($tabledesc);

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
date longtext,
tags longtext,
attached_files longtext,

)";

mysql_query($sql,$con);
echo "Your posts table has been created";

$insert = "INSERT INTO blog_lister (pageName, pageDesc, themeid)
VALUES ('".$tablename."', '".$tabledesc."', '".$theme."')";
mysql_query($insert,$con);
$bloglistertableid = mysql_insert_id();

$insert = "INSERT INTO introductions (blogname) VALUES ('".$tablenameclean."')";
mysql_query($insert,$con);

$insert = "INSERT INTO introductions (introduction) VALUES ('Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.') WHERE blogname='$tablenameclean'";
$insert ="UPDATE introductions SET introduction='Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.' WHERE blogname='$tablenameclean'";
mysql_query($insert,$con);

$sidebar_content = "<ul><li>Edit</li><li>This</li><li><a href='http://mysite.com/'>Link</a></li></ul>";
$sidebar_content = mysql_real_escape_string($sidebar_content);
$insert = "INSERT INTO sidebars (blogname) VALUES ('".$tablenameclean."')";
mysql_query($insert,$con);

$insert = "INSERT INTO sidebars (sidebar) VALUES ('".$sidebar_content."') WHERE blogname='$tablenameclean'";
$insert ="UPDATE sidebars SET sidebar='".$sidebar_content."' WHERE blogname='$tablenameclean'";
mysql_query($insert,$con);


View_Panel_MySQL_Kill();

//Create index file 
if (isset($_POST['default'])) {
$infofile = "<?php
header('Location: ".$tablenameclean."');
?>";
$infofilewrite = fopen("../../../index.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);
}

//Make the base blog files
mkdir("../../../".$tablenameclean."", 0777);

//Write theme include
$infofile = "<?php
include('lib/config.php');
include('lib/header.php');
include('../admin/lib/config.php');

\$result = mysql_query('SELECT themeid FROM blog_lister WHERE id = ".$bloglistertableid."');
while(\$row = mysql_fetch_array($result)) {
\$themeid = \$row[themeid];
}
\$result = mysql_query('SELECT themelocation FROM viewpanel_themes WHERE themeid = \$themeid');
while(\$row = mysql_fetch_array($result)) {
	include(\"../admin/themes/\$row['themelocation']/theme.php\");
}
?>";
$infofilewrite = fopen("../../../".$tablenameclean."/index.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);



//Write information file
mkdir("../../../".$tablenameclean."/lib", 0777);
$infofile = "<?php
\$blogname = '".$tablename."';
\$blogdesc = '".$tabledesc."';
\$blogname = stripslashes($blogname);
\$blogdesc = stripslashes($blogdesc);
\$tablenameclean = preg_replace('/[^a-zA-Z0-9]/', '', '".$tablename."');
\$tablenameclean = strtolower(\$tablenameclean);
?>";
$infofilewrite = fopen("../../../".$tablenameclean."/lib/config.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);

//Blog header
$infofile = "<?php
//Header file
?>";
$infofilewrite = fopen("../../../".$tablenameclean."/lib/header.php","w");
fwrite($infofilewrite, $infofile);
fclose($infofilewrite);

$url_parse = "../../../$tablenameclean/index.php";
echo "<p>Blog Created! Click <a href='../../../".$tablenameclean."/'>here</a> to view it.</p>
<p>Or why not use the widget below to share your new blog with the world via Facebook, Twitter and more!</p>
<div class='a2a_kit a2a_default_style'>
<a class='a2a_dd' href='http://www.addtoany.com/share_save?linkurl=".$url_parse."&amp;linkname='>Share</a>
<span class='a2a_divider'></span>
<a class='a2a_button_facebook'></a>
<a class='a2a_button_twitter'></a>
<a class='a2a_button_email'></a>
<a class='a2a_button_myspace'></a>
<a class='a2a_button_stumbleupon'></a>
<a class='a2a_button_google_buzz'></a>
<a class='a2a_button_bebo'></a>
<a class='a2a_button_digg'></a>
</div>
<script type='text/javascript'>
var a2a_config = a2a_config || {};
a2a_config.linkurl = '".$url_parse."';
</script>
<script type='text/javascript' src='http://static.addtoany.com/menu/page.js'></script>
<p>Or you could just go back to the <a href='../../login.php'>login</a> page.</p>";
?>