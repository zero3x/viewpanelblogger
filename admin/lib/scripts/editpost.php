<?php
include("../config.php");

$tablename = $_GET['tablename'];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);
$idtoedit = $_GET['id'];
$editbox = nl2br($_POST['edit']);
$editbox = mysql_real_escape_string($editbox);
$posttitle = nl2br($_POST['posttitle']);
$posttitle = mysql_real_escape_string($posttitle);
$postauthor = nl2br($_POST['author']);
$postauthor = mysql_real_escape_string($postauthor);
$sql="UPDATE $tablenameclean SET posttitle='".$posttitle."', post='".$editbox."', author='".$postauthor."' WHERE id = '$idtoedit'";

$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not edit the post: ' . mysql_error());
}
echo "Post edited.<br \>";

View_Panel_MySQL_Kill();

echo "<p>Post edited. Click <a href='../../login.php'>here</a> to return to the login page.</p>";

?>