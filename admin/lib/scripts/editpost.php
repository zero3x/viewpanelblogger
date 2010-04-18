<?php
include("../config.php");

$tablename = $_GET['tablename'];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);
$idtoedit = $_GET['id'];
$editbox = nl2br($_POST['edit']);

$sql="UPDATE $tablenameclean SET post='".$editbox."', author='".$_POST[author]."' WHERE id = '$idtoedit'";

$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not edit the post: ' . mysql_error());
}
echo "Post edited.<br \>";

View_Panel_MySQL_Kill();

echo "<p>Post edited. Click <a href='../../login.php'>here</a> to return to the login page.</p>";

?>