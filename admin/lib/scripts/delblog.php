<?php 
include("../config.php");

if ($_POST["sure"] == "Yes" | $_POST["sure"] == "yes") {
if (!$_POST["table"]) {
die('You did not complete all of the required fields. Please go back and try again.');
}

$tablename = $_POST["table"];
$sure = $_POST["sure"];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);

$sql = "DROP TABLE $tablenameclean";
$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete table: ' . mysql_error());
}
echo "Table deleted successfully <br \>";

$sql = "DELETE FROM page_lister WHERE pageName = '$tablename'";
$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete record from page_lister table: ' . mysql_error());
}
echo "page_lister record deleted successfully <br \>";

View_Panel_MySQL_Kill();

//Remove blog files

destroydir("../../../".$tablenameclean."/");

echo "<p>Blog deleted. Click <a href='../../login.php'>here</a> to return to the login page.</p>";
} else {
	echo "It seems you don't want to delete the blog as you did not type 'Yes' or 'yes' in the confirm box.";
}
?>