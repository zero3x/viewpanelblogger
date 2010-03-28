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
		echo "<option name='$theme'>$theme</option>";
	}
}

function get_num_users() {	
	$result = mysql_query("SELECT * FROM users");
	$num_rows = mysql_num_rows($result);
	
	echo "$num_rows\n";
}

function dirSize($directory) {
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        $size+=$file->getSize();
    }
    echo $size;
} 
?>