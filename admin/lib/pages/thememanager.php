<?php if($_GET['action'] == "uploadtheme") {
	$infofile = $_POST['blog_header'];
	$infofile = stripslashes($infofile);
	$tablenameclean = $_GET['blog'];
	$infofilewrite = fopen("../".$tablenameclean."/lib/header.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	echo "<div class='messagebox'>Header Saved!</div>";
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
    <td><a href='?action=removetheme'>Remove Theme</a></td>
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
