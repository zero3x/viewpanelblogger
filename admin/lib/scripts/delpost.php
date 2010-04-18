<?php
include("../config.php");

$tablename = $_GET['tablename'];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);
$idtodel = $_POST['postid'];

$sql = "DELETE FROM $tablenameclean WHERE id = '$idtodel'";

$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete the post: ' . mysql_error());
}
echo "Post deleted.<br \>";

View_Panel_MySQL_Kill();

echo "<p>Post deleted. Click <a href='../../login.php'>here</a> to return to the login page.</p>";

?>