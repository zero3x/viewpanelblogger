<?php if($_GET['action'] == "uploadtheme") {
		if($_FILES['file']['type'] == "image/gif") {
		$zip = new ZipArchive;
			if ($zip->open($_FILES['file']['tmp_name']) === TRUE) {
				$zip->extractTo("themes/".$_FILES['file']['name']."/");
				$zip->close();
				ob_start();
				include "themes/".$_FILES['file']['name']."/theme.php";
				ob_end_clean();
				if (!isset($themeauthor)) {
					$themeauthor = "Unknown Author";
				}
				$random = rand(0,999);
				if (!isset($themename)) {
					$themeauthor = "Untitled Theme ".$random;
				}
				$insert = "INSERT INTO viewpanel_themes (themename, themeauthor, themelocation)
				VALUES ('".$themename."', '".$themeauthor."', '".$_FILES['file']['name']."')";
				mysql_query($insert);
				echo "<div class='messagebox'>Theme Uploaded</div>";
			} else {
				echo "<div class='messagebox'>Couldn't Extract Theme</div>";
			}
		} else {
			echo "<div class='messagebox'>Theme Was Not A .zip</div>";
}

if($_GET['action'] == "uploadtheme") {
	
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
    <td><a href='?action=removetheme'>Remove Theme</a> | <a href='?action=edittheme&id=".$row['id']."'>Edit File</a></td>
  </tr> ";
	}
  ?>
</table>
<p><strong>Install A New Theme</strong></p>
<p>This uploader will only take .zip files.</p>
<form action="?action=uploadtheme" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label>
    <input type="file" name="themeupload" id="themeupload" />
  </label>
  <label>
    <input type="submit" name="Upload" id="Upload" value="Submit" />
  </label>
</form>
<p><strong>Install A Theme From View Panel's Server</strong></p>
<p>Sorry, you can't yet do this.</p>
<p>&nbsp;</p>
