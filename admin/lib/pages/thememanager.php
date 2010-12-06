<?php if($_GET['action'] == "uploadtheme") {
	    //Check if the upload is a .zip
		if($_FILES['themeupload']['type'] == "file/zip" or $_FILES['themeupload']['type'] == "application/x-zip-compressed" or $_FILES['themeupload']['type'] == "application/zip") {
			//Create temp directory, move zip to it.
			mkdir("themes/temp", 0777);
			$target = "themes/temp".basename($_FILES['themeupload']['name']) ; 
			move_uploaded_file($_FILES['themeupload']['tmp_name'], $target);
			//Extract zip and check if theme.php exists
			$zip = new ZipArchive;
			$location = $zip->open($target);
			if ($location === TRUE) {
				$zip->extractTo("themes/temp/themeextract");
				$zip->close();
			} else {
				echo "Failed to extract.";
			}
			if (file_exists("themes/temp/themeextract/theme.php")) {
				include("themes/temp/themeextract/theme.php");
				if (!isset($theme_author)) {
					$theme_name = "Unknown author";
				}
				if (!isset($theme_name)) {
					$random = rand(0, 9999999);
					$theme_name = "Unknown Name ".$random;
				}
				//Move theme folder, delete temp.
				rename("themes/temp/themeextract", "themes/".$theme_name);
				if (file_exists("themes/".$theme_name."/theme.php")) {
					//Insert values into database
				} else {
					echo "Failed to move theme from temp";
				}
			} else {
				echo "Failed to find theme.php";
			}
		}
}

if($_GET['action'] == "removetheme") {
	
}

if($_GET['action'] == "edittheme") {
	
}
?>


<h1>Theme Manager</h1>
<p><strong>Current Installed Themes</strong></p>
<table width="100%" border="0">
  <tr>
    <td>Theme Name</td>
    <td>Author</td>
    <td>Actions</td>
  </tr>
 <?php 
 $result = mysql_query("SELECT * FROM viewpanel_themes");
	while($row = mysql_fetch_array($result)) {
echo"
  <tr>
    <td>".$row['themename']."</td>
    <td>".$row['themeauthor']."</td>
    <td><a href='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."?action=removetheme'>Remove Theme</a> | <a href='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."?action=edittheme&id=".$row['id']."'>Edit File</a></td>
  </tr> ";
	}
  ?>
</table>

<?php 
if ($phpversion >= 5.2 and installedext("zlib") == true) {
	echo "<p><strong>Install A New Theme</strong></p>";
	echo "<p>This uploader will only take .zip files.</p>";
	echo "<form action='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&action=uploadtheme' method='post' enctype='multipart/form-data' name='form1' id='form1'>";
	echo "  <label>";
	echo "    <input type='file' name='themeupload' id='themeupload' />";
	echo "  </label>";
	echo "  <label>";
	echo "    <input type='submit' name='Upload' id='Upload' value='Submit' />";
	echo "  </label>";
	echo "</form>";
	echo "<p><strong>Install A Theme From View Panel's Server</strong></p>";
	echo "<p>Sorry, you can't yet do this.</p>";
} else if ($phpversion < 5.2) {
	echo "<p>Sorry, but you are using version ".$phpversion." of PHP. To upload and install themes via this interface you need at least PHP version 5.2. We are working on making this interface compatible with earlier versions. Don't worry though, you can still add themes manually!</p>";
} else {
	echo "<p>Sorry, but we weren't able to determine your PHP version. For safety reasons this upload interface and been disabled. To upload and install themes via this interface you need at least PHP version 5.2. We are working on making this interface compatible with earlier versions. Don't worry though, you can still add themes manually!</p>";
}
?>
