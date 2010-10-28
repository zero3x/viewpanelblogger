<?php 
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: savesettings.php                                             ***
***   Use: Save the variables edited in the settings page.                   ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/
include("../config.php");
if ($_POST["fileviewer_enabled"] == "enabled") {
	$fileviewer = "enabled";
} else {
	$fileviewer = "disabled";
}

if ($_POST["dbviewer_enabled"] == "enabled") {
	$databaseviewer = "enabled";
} else {
	$databaseviewer = "disabled";
}

$_POST["websiteurl"] = addslashes($_POST["websiteurl"]);
$newmysqluser = $_POST["mysqlusernamenew"];
$newmysqlpass = $_POST["mysqlpasswordnew"];
$databaseloc = $_POST["databaselocation"];
$databasename = $_POST["databasename"];
$_POST['timeoffset'] = addslashes($_POST['timeoffset']);

$insert = "INSERT INTO vpmainsettings (timeoffset, fileviewer, usermanager, uploadlimit, siteurl)
VALUES ('".$_POST['timeoffset']."', '".$fileviewer."', '".$databaseviewer."', '', '".$_POST["websiteurl"]."')";
mysql_query($insert);

//Write variables
$encryptpass = base64_encode($newmysqlpass);
$dbfilehandle = fopen("../databasesettings.php","w");
$dbvariableshandle = "<?php \n
\$dbuser='".$newmysqluser."'; \n
\$dbpass ='".$encryptpass."'; \n
\$dbname ='".$databasename."'; \n
\$localdatabase ='".$databaseloc."'; \n
\$fileview_enabled ='".$fileviewer."'; \n
\$databaseview_enabled ='".$databaseviewer."'; \n
?>";
fwrite($dbfilehandle, $dbvariableshandle); 
fclose($dbfilehandle);

echo "<p>Settings saved. Click <a href='../../login.php'>here</a> to return to the login page.</p>"
?>
