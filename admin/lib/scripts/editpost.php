<?php
include("../lib/config.php");

$tablenameclean = $_GET['tablename'];
$idtoedit = $_GET['id'];

$sql="UPDATE $tablenameclean SET post='".$_POST[edit]."', author='".$_POST[author]."' WHERE id = '$idtoedit'";

$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not edit the post: ' . mysql_error());
}
echo "Post edited.<br \>";

View_Panel_MySQL_Kill();

echo "<p>Post edited. Click <a href='../login.php'>here</a> to return to the login page.</p>";

?>