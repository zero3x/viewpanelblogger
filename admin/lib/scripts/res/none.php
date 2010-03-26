<?php
//BLOG CREATION VERSION 1. WRITTEN FOR VERSION 2.3.2 ON THE 30TH OF DECEMBER 2009.
//TODO: Theme support.
//AUTHOUR: Al Wilde.
//This file is the basic template for all blogs. 
//NOTE: Please use a single speech mark not a double.

include('../admin/lib/config.php'); //Gets the MySQL connection and loads functions.

//Output posts and author as table
$query = 'SELECT post,author,date FROM $tablenameclean ORDER BY id DESC'; 
$output = mysql_query($query) or die(mysql_error());
$borderwidth = '0';

echo '<table border=0 id=\'blogposts\'>'; 
while($row = mysql_fetch_array($output)){
echo '<tr>';
echo '<td>'.$row[post].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td><h5>Posted by '. $row[author] .' on '. $row[date].'</h5></td>';
echo '</tr>';
}
echo '</table>'; 
?>