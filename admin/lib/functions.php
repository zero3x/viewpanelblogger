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
	$dir = "themes";
	$themes = scandir($dir);
	foreach($themes as $theme) {
		if ($theme == "." or $theme == ".." or $theme == "index.php") {
		} else {
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
function out_posts($border = '0', $author = 'Posted by', $date = 'on', $layout_1 = 'post', $layout_2 = 'author', $titleclass = 'posttitle', $postclass = 'blogposts', $author_timeclass = 'authorandtime') {
	include("lib/config.php");
	mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
	mysql_select_db($GLOBALS['$dbname']);
	$query = "SELECT posttitle,post,author,date FROM ". $GLOBALS['tablenameclean'] ." ORDER BY id DESC"; 
    $output = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($output)){
	echo "<table border='".$border."' class='".$titleclass."'>"; 
	echo "<tr>";
	echo "<td>".$row[posttitle]."</td>";
	echo "</tr>";
	echo "</table>";
	if ($layout_1 = "post") {
		echo "<table border='".$border."' class='".$postclass."'>"; 
		echo "<tr>";
		echo "<td>".$row[post]."</td>";
		echo "</tr>";
		echo "</table>";
	} else {
		$authortime_combine = "".$author." ".$row['author']." ".$date." ".$row['date'];
		echo "<table border='".$border."' class='".$author_timeclass."'>";
		echo "<tr>";
		echo "<td>".$authortime_combine."</td>";
		echo "</tr>";
		echo "</table>";
	} if ($layout_2 = "author") {
		$authortime_combine = "".$author." ".$row['author']." ".$date." ".$row['date'];
		echo "<table border='".$border."' class='".$author_timeclass."'>";
		echo "<tr>";
		echo "<td>".$authortime_combine."</td>";
		echo "</tr>";
		echo "</table>";
	} else {
		echo "<table border='".$border."' class='".$postclass."'>"; 
		echo "<tr>";
		echo "<td>".$row[post]."</td>";
		echo "</tr>";
		echo "</table>";
	}
	}
}

function out_intro($border = '0', $introclass = 'introduction') {
	include("lib/config.php");
	mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
	mysql_select_db($GLOBALS['$dbname']);
	$query = "SELECT introduction FROM introductions WHERE blogname='". $GLOBALS['tablenameclean'] ."'"; 
    $output = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($output)){
		echo $row[introduction];
	}
}
?>