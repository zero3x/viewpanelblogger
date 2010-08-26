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

//Access Check
function checkrank($aboverank, $operator = '==') {
	$sql = "SELECT rank FROM users WHERE username = '".$_COOKIE['View_Panel_ID']."'";
	$query = mysql_query($sql);
	while($row = mysql_fetch_array($query)){
		$user_rank = $row['rank'];
	}
	eval ('$rank_check = $aboverank' . $operator . '$user_rank ;') ;
	if ($rank_check) {
		
	} else {
		header("Location: panel.php?page=accessdenied-show");
	}
}

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
	while($row = mysql_fetch_array($result)) {
		echo "<option>".$row['pageName']."</option>";
	}
	mysql_close($con);	
}

function View_Panel_Blog_Lister($output_get = 'blog') {
	$result = mysql_query("SELECT * FROM page_lister");
	echo "<option></option>";
	while($row = mysql_fetch_array($result)) {
		echo "<option value='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&".$output_get."=".$row['pageName']."'>".$row['pageName']."</option>";
	}
	mysql_close($con);	
	}

function View_Panel_Theme_Lister() {
	$dir = "themes";
	$themes = scandir($dir);
if(empty($themes))
   {
     return false;
   }

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

function dirsize($path){
/*if(!file_exists($path)) return 0;
if(is_file($path)) return filesize($path);
$ret = 0;
if(empty($path))
   {
     return false;
     echo "Not Supported On Server.";
   }
foreach(glob($path."/*") as $fn)
$ret += dirsize($fn);
return $ret." bytes";*/
}

function View_Panel_Get_Version() {
	$current = file_get_contents('http://streeteye.info/viewpanel/versiontracker/viewpanelversiontracker.php');
	if ($current == $panelversion) {
		return true;
	} else {
		return false;
}
}
//Blog Functions
function out_intro($border = '0', $introclass = 'introduction') {
	include("lib/config.php");
	//Get info from the header file (if any)
	if (isset($GLOBALS['header_override']['introduction']['border'])) {
		$border = $GLOBALS['header_override']['introduction']['border'];
	}
	if (isset($GLOBALS['header_override']['introduction']['class'])) {
		$introclass = $GLOBALS['header_override']['introduction']['class'];
	}
	mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
	mysql_select_db($GLOBALS['$dbname']);
	$query = "SELECT introduction FROM introductions WHERE blogname='". $GLOBALS['tablenameclean'] ."'"; 
    $output = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($output)){
             $intro_out = stripslashes($row[introduction]);
	    echo "<table border='".$border."' class='".$introclass."'>"; 
		echo "<tr>";
		echo "<td>".$row[introduction]."</td>";
		echo "</tr>";
		echo "</table>"; 
		
	}
}

function out_expanded($border = '0', $author = 'Posted by', $date = 'on', $layout_1 = 'post', $layout_2 = 'author', $titleclass = 'posttitle', $postclass = 'blogposts', $author_timeclass = 'authorandtime') {
	if (isset($_GET[postid])) {
		include("lib/config.php");
		//Get info from the header file (if any)
		if (isset($GLOBALS['header_override']['expanded']['border'])) {
			$border = $GLOBALS['header_override']['expanded']['border'];
		}
		if (isset($GLOBALS['header_override']['expanded']['author'])) {
			$author = $GLOBALS['header_override']['expanded']['author'];
		}
		if (isset($GLOBALS['header_override']['expanded']['date'])) {
			$date = $GLOBALS['header_override']['expanded']['date'];
		}
		if (isset($GLOBALS['header_override']['expanded']['layout1'])) {
			$layout_1 = $GLOBALS['header_override']['expanded']['layout1'];
		}
		if (isset($GLOBALS['header_override']['expanded']['layout2'])) {
			$layout_2 = $GLOBALS['header_override']['expanded']['layout2'];
		}
		if (isset($GLOBALS['header_override']['expanded']['titleclass'])) {
			$titleclass = $GLOBALS['header_override']['expanded']['titleclass'];
		}
		if (isset($GLOBALS['header_override']['expanded']['postclass'])) {
			$postclass = $GLOBALS['header_override']['expanded']['postclass'];
		}
		if (isset($GLOBALS['header_override']['expanded']['authorandtimeclass'])) {
			$author_timeclass = $GLOBALS['header_override']['expanded']['authorandtimeclass'];
		}
		mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
		mysql_select_db($GLOBALS['$dbname']);
		$query = "SELECT posttitle,post,author,date FROM ". $GLOBALS['tablenameclean'] ." WHERE id = $_GET[postid]"; 
		$output = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($output)){
                $title_out = stripslashes($row[posttitle]);
                $content_out = stripslashes($row[post]);
                $author_out = stripslashes($row[author]);
		echo "<table border='".$border."' class='".$titleclass."'>"; 
		echo "<tr>";
		echo "<td>".$title_out."</td>";
		echo "</tr>";
		echo "</table>";
		if ($layout_1 = "post") {
			echo "<table border='".$border."' class='".$postclass."'>"; 
			echo "<tr>";
			echo "<td>".$content_out."</td>";
			echo "</tr>";
			echo "</table>";
		} else {
			$authortime_combine = "".$author." ".$author_out." ".$date." ".$row['date'];
			echo "<table border='".$border."' class='".$author_timeclass."'>";
			echo "<tr>";
			echo "<td>".$authortime_combine."</td>";
			echo "</tr>";
			echo "</table>";
		} if ($layout_2 = "author") {
			$authortime_combine = "".$author." ".$author_out." ".$date." ".$row['date'];
			echo "<table border='".$border."' class='".$author_timeclass."'>";
			echo "<tr>";
			echo "<td>".$authortime_combine."</td>";
			echo "</tr>";
			echo "</table>";
		} else {
			echo "<table border='".$border."' class='".$postclass."'>"; 
			echo "<tr>";
			echo "<td>".$content_out."</td>";
			echo "</tr>";
			echo "</table>";
		}
		}
	}
}

function out_posts($border = '0', $author = 'Posted by', $date = 'on', $layout_1 = 'post', $layout_2 = 'author', $titleclass = 'posttitle', $postclass = 'blogposts', $author_timeclass = 'authorandtime', $charsper = '40') {
	if (!isset($_GET[postid])) {
	include("lib/config.php");
	//Get info from the header file (if any)
	if (isset($GLOBALS['header_override']['postlist']['border'])) {
		$border = $GLOBALS['header_override']['postlist']['border'];
	}
	if (isset($GLOBALS['header_override']['postlist']['author'])) {
		$author = $GLOBALS['header_override']['postlist']['author'];
	}
	if (isset($GLOBALS['header_override']['postlist']['date'])) {
		$date = $GLOBALS['header_override']['postlist']['date'];
	}
	if (isset($GLOBALS['header_override']['postlist']['layout1'])) {
		$layout_1 = $GLOBALS['header_override']['postlist']['layout1'];
	}
	if (isset($GLOBALS['header_override']['postlist']['layout2'])) {
		$layout_2 = $GLOBALS['header_override']['postlist']['layout2'];
	}
	if (isset($GLOBALS['header_override']['postlist']['titleclass'])) {
		$titleclass = $GLOBALS['header_override']['postlist']['titleclass'];
	}
	if (isset($GLOBALS['header_override']['postlist']['postclass'])) {
		$postclass = $GLOBALS['header_override']['postlist']['postclass'];
	}
	if (isset($GLOBALS['header_override']['postlist']['authorandtimeclass'])) {
		$author_timeclass = $GLOBALS['header_override']['postlist']['authorandtimeclass'];
	}
	if (isset($GLOBALS['header_override']['postlist']['characterlimit'])) {
		$charsper = $GLOBALS['header_override']['postlist']['characterlimit'];
	}
	mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
	mysql_select_db($GLOBALS['$dbname']);
	$query = "SELECT id,posttitle,post,author,date FROM ". $GLOBALS['tablenameclean'] ." ORDER BY id DESC"; 
    $output = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($output)){
                $title_out = stripslashes($row[posttitle]);
                $content_out = stripslashes($row[post]);
                $author_out = stripslashes($row[author]);
                $postcontent_fetched = $content_out;
                if (strlen($postcontent_fetched) > $charsper) {;
		$postcontent_fetched = substr($postcontent_fetched, 0, $charsper);
		$postcontent_fetched = $postcontent_fetched."...";
         }
	echo "<table border='".$border."' class='".$titleclass."'>"; 
	echo "<tr>";
	echo "<td>".$title_out."</td>";
	echo "</tr>";
	echo "</table>";
	if ($layout_1 = "post") {
		echo "<table border='".$border."' class='".$postclass."'>"; 
		echo "<tr>";
		echo "<td>".$postcontent_fetched."</td>";
		echo "</tr>";
		echo "</table>";
	} else {
		$authortime_combine = "".$author." ".$author_out." ".$date." ".$row['date'];
		echo "<table border='".$border."' class='".$author_timeclass."'>";
		echo "<tr>";
		echo "<td>".$authortime_combine."</td>";
		echo "</tr>";
		echo "</table>";
	} if ($layout_2 = "author") {
		$authortime_combine = "".$author." ".$author_out." ".$date." ".$row['date'];
		echo "<table border='".$border."' class='".$author_timeclass."'>";
		echo "<tr>";
		echo "<td>".$authortime_combine." | <a href='?postid=".$row['id']."'>Readmore</a></td>";
		echo "</tr>";
		echo "</table>";
	} else {
		echo "<table border='".$border."' class='".$postclass."'>"; 
		echo "<tr>";
		echo "<td>".$postcontent_fetched."</td>";
		echo "</tr>";
		echo "</table>";
	}
	}
	}
}

function out_blogtitle($headertagstart = '<h1>', $headertagend = '</h1>', $logoimage=NULL) {
	//Get info from the header file (if any)
	if (isset($GLOBALS['header_override']['blogtitle']['firsttag'])) {
		$headertagstart = $GLOBALS['header_override']['introduction']['firsttag'];
	}
	if (isset($GLOBALS['header_override']['blogtitle']['secondtag'])) {
		$headertagend = $GLOBALS['header_override']['introduction']['secondtag'];
	}
	if (isset($GLOBALS['header_override']['blogtitle']['image'])) {
		$logoimage = $GLOBALS['header_override']['introduction']['image'];
	}
	if (isset($logoimage)) {
		echo "<img src='".$logoimage."' />";
	} else {
	echo $headertagstart.$GLOBALS['blogname'].$headertagend;
	}
}

function out_blogsubtitle($headertagstart = '<h2>', $headertagend = '</h2>') {
	if (isset($GLOBALS['header_override']['subtitle']['firsttag'])) {
		$headertagstart = $GLOBALS['header_override']['introduction']['firsttag'];
	}
	if (isset($GLOBALS['header_override']['subtitle']['secondtag'])) {
		$headertagend = $GLOBALS['header_override']['introduction']['secondtag'];
	}
	echo $headertagstart.$GLOBALS['blogdesc'].$headertagend;
}

function out_sidebar() {
	include("lib/config.php");
	mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
	mysql_select_db($GLOBALS['$dbname']);
	$query = "SELECT id,sidebar FROM sidebars WHERE blogname ='". $GLOBALS['tablenameclean'] ."'"; 
    $output = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($output)){
		$sidebar_out = stripslashes($row[sidebar]);
		echo $sidebar_out;
	}
}

function out_footer($author=NULL, $copyright=NULL) {
	$copyright = $GLOBALS['blogname'];
	if (isset($GLOBALS['header_override']['footer']['copyright'])) {
		$copyright = $GLOBALS['header_override']['footer']['copyright'];
	}
	echo "Copyright 2010 ".$copyright." | ".$author." | <a href='http://viewpanel.streeteye.info'>Powered by View Panel</a>";
}

/* function out_loginform () {
	
} */
?>