<?php 
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: functions.php                                                ***
***   Use:                                                                   ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/

//Destroy's Directory and all files / folders in it
function destroydir ($dir) { 
if ($handle = opendir($dir))
{
$array = array();

    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {

			if(is_dir($dir.$file))
			{
				if(!@rmdir($dir.$file)) 
				{
                destroydir($dir.$file.'/');
				}
			}
			else
			{
               @unlink($dir.$file);
			}
        }
    }
    closedir($handle);

	@rmdir($dir);
} 
}

function copydir( $source, $target ) {
	if ( is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				copydir( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
 
		$d->close();
	}else {
		copy( $source, $target );
	}
}

function View_Panel_Page_Lister() {

$result = mysql_query("SELECT * FROM page_lister");
while($row = mysql_fetch_array($result))
  {
  echo "<option>".$row['pageName']."</option>";
  }
mysql_close($con);	
}

function View_Panel_Theme_Lister() {
	$dir = "themes/blogs";
	$themes = scandir($dir);
	foreach($themes as $theme) {
		if ($theme != "." or $theme != "..") {
		echo "<option name='$theme'>$theme</option>";
		}
	}
}

function get_num_users() {	
	$result = mysql_query("SELECT * FROM users");
	$num_rows = mysql_num_rows($result);
	
	echo "$num_rows\n";
}

function dirSize($directory) {                                                                      //TO BE REMOVED AS OFF 2.5
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        $size+=$file->getSize();
    }
    echo $size;
} 

//Blog Functions

function get_posts($border = "0", $order = "DESC", $tableid = "blogposts") {
	include_once("lib/config.php");
	$query = 'SELECT post FROM '.$tablenameclean.' ORDER BY id $order'; 
	$output = mysql_query($query) or die(mysql_error());
	
	echo '<table border=$border id=\'$tableid\'>'; 
	while($row = mysql_fetch_array($output)){
	echo '<tr>';
	echo '<td>'.$row[post].'</td>';
	echo '</tr>';
	}
	echo '</table>'; 
}

function out_posts($border = "0", $authortime = "Posted by '. $row[author] .' on '. $row[date].'", $layout_1 = "post", $layout_2 = "author", $postid = "blogposts", $author_timeid = "authortime") {
	include_once("lib/config.php");
	$query = 'SELECT post,author,date FROM '.$tablenameclean.' ORDER BY id DESC'; 
    $output = mysql_query($query) or die(mysql_error());
	
	if ($layout_1 = "post") {
		echo '<table border=$border id=\'$postid\'>'; 
		while($row = mysql_fetch_array($output)){
		echo '<tr>';
		echo '<td>'.$row[post].'</td>';
		echo '</tr>';
		echo '</table>'
	} else {
		echo '<table border=$border id=\'$author_timeid\'>'
		echo '<tr>';
		echo '$authortime';
		echo '</tr>';
	} if ($layout_1 = "author") {
		echo '</table>'; 
		echo '<table border=$border id=\'$author_timeid\'>'
		echo '<tr>';
		echo '$authortime';
		echo '</tr>';
	} else {
		echo '<table border=$border id=\'$postid\'>'; 
		while($row = mysql_fetch_array($output)){
		echo '<tr>';
		echo '<td>'.$row[post].'</td>';
		echo '</tr>';
		echo '</table>'
	}
	}
	echo '</table>'; 
}
?>