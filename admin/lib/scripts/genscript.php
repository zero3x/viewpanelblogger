<?php
include '../config.php';
$table = $_POST["table"];
$border = $_POST["bordersize"];
$tablesettings = $_POST["tablesettings"];
$post = "post";
$author = "author";
$theformat = $_POST["theformat"];

//Connect to database using external settings

$query = "SELECT post,author FROM $table";

$result = mysql_query($query) or die(mysql_error());
echo $tablesettings;
echo $theformat;
while($row = mysql_fetch_array($result)){
echo "<tr><td>";
echo $row['post'];
echo "</td><td>";
echo $row['author'];
echo "</td></tr>";
}
echo "</table>";
?>