<title>Installing...</title>
<?php
//Checks that passwords match
if ($_POST['dbpass'] != $_POST['confpass'] ) {
	die('The passwords didn\'t match.');
}
//Checks all fields have been filled out
if (!$_POST['localdatabase']  | !$_POST['dbname'] | !$_POST['dbuser'] ) {
die('You did not complete all of the required fields. Please go back and try again.');
}

//Variables from form
$localdatabase = $_POST["localdatabase"];
$externaldatabase = $_POST["externaldatabase"];
$dbname = $_POST["dbname"];
$dbuser = $_POST["dbuser"];
$dbpass = $_POST["dbpass"];
$sameserver = $_POST["sameserver"];
$timeoffset = $_POST["timeoffset"];
 
$tablename = $_POST["tablename"];
$tabledesc = $_POST["tabledesc"];

$websiteUrl = $_POST["siteurl"];

$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);

//Establish if they are using the local or external connection and connect.
echo "<p>Establishing connection.</p>";
	$con = mysql_connect($localdatabase,$dbuser,$dbpass);
    if (!$con){
        die('Could not connect: ' . mysql_error());
        echo "View Panel could not connect to the database. Please go back and check your settings.";
    }

//Create the tables
echo "<p>Creating tables.</p>";

mysql_select_db($dbname, $con);
$sql = "CREATE TABLE page_lister
(
id mediumint(9) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
pageName varchar(60),
pageDesc varchar(60)
)";

mysql_query($sql,$con);
echo "<p>Page Listing table created</p>";

mysql_select_db($dbname, $con);
$sql = "CREATE TABLE $tablenameclean
(
id mediumint(9) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
post longtext,
author tinytext,
date longtext
)";

mysql_query($sql,$con);
echo "<p>Your posts table has been created</p>";

mysql_select_db($dbname, $con);
$sql = "CREATE TABLE plugin_lister
(
id mediumint(9) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
pluginname longtext,
pluginauthor tinytext,
fileloc longtext,
installed tinytext
)";

mysql_query($sql,$con);
echo "<p>Your plugins table has been created</p>";

$insert = "INSERT INTO page_lister (pageName, pageDesc)
VALUES ('".$tablename."', '".$tabledesc."')";
mysql_query($insert,$con);

mysql_close($con);


$installdonefile = fopen("../lib/installcomplete.txt","w");
$surlcontent = "DO NOT DELETE ME!";
fwrite($siteurlfile, $surlcontent);
fclose($installdonefile);

$encryptpass = base64_encode($dbpass);
$dbfilehandle = fopen("../lib/databasesettings.php","w");
$dbvariableshandle = "<?php \n
\$dbuser='".$dbuser."'; \n
\$dbpass ='".$encryptpass."'; \n
\$dbname ='".$dbname."'; \n
\$localdatabase ='".$localdatabase."'; \n
\$siteurl ='".$websiteUrl."'; \n
\$timeoffset ='".$timeoffset."'; \n
\$fileview_enabled ='checked'; \n
\$databaseview_enabled ='checked'; \n
?> \n";
fwrite($dbfilehandle, $dbvariableshandle); 
fclose($dbfilehandle);

//Make the base blog files
mkdir("../../".$tablenameclean."", 0777);

$blogtemplate = "
<?php

//BLOG CREATION VERSION 1. WRITTEN FOR VERSION 2.3 ON THE 24TH OF MARCH 2010.
//TODO: Theme support.
//AUTHOUR: Al Wilde.
//This file is the basic template for all blogs. 
//NOTE: Please use a single speech mark not a double.

include('../admin/lib/config.php'); //Gets the MySQL connection and loads functions.

//Output posts and author as table
\$query = 'SELECT post,author,date FROM $tablenameclean'; 
\$output = mysql_query(\$query) or die(mysql_error());
\$borderwidth = '0';

echo '<link rel='stylesheet' type='text/css' href='style.css'> '
echo '<table border=0 class='posts'>'; 
while(\$row = mysql_fetch_array(\$output)){
echo '<tr>';
echo '<td>'.\$row[post].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td><h5>Posted by '. \$row[author] . ' on ' . \$row[date]. '</h5></td>';
echo '</tr>';
}
echo '<tr>';
echo '<td><h5>Powered by View Panel.</h5></td>';
echo '</tr>';
echo '</table>'; 

//You MAY NOT remove the \'Powered by View Panel.\' line without permission from Al Wilde. You may add on your own copyright though (EXAMPLE: Powered by View Panel with the pluginname plugin.)
?> ";

$blogfilewrite = fopen("../../".$tablenameclean."/index.php","w");
fwrite($blogfilewrite, $blogtemplate);
fclose($blogfilewrite);

echo "<p><a href='index.php?action=register'>Click here</a> to continue...</p>"

?>


