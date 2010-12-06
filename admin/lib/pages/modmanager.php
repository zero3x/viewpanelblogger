<?php if(isset($_POST['submit_header'])) {
	$infofile = $_POST['blog_header'];
	$infofile = stripslashes($infofile);
	$tablenameclean = $_GET['blog'];
	$infofilewrite = fopen("../".$tablenameclean."/lib/header.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	echo "<div class='messagebox'>Header Saved!</div>";
}

if(isset($_POST['submit_redirection'])) {
	$infofile = $_POST['redirection_file'];
	$infofile = stripslashes($infofile);
	$infofilewrite = fopen("../index.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	echo "<div class='messagebox'>Redirector Saved!</div>";
}
?>


<h1>Mod Manager</h1>
<p><strong>Current Installed Mods</strong></p>
<table width="100%" border="0">
  <tr>
    <td>Mod Name</td>
    <td>Author</td>
    <td>Actions</td>
  </tr>
<?php 
$result = mysql_query("SELECT * FROM mod_lister");
while($row = mysql_fetch_array($result)) {
	echo"<tr>";
	echo"<td>".$row['pluginname']."</td>";
	echo"<td>".$row['pluginauthor']."</td>";
	if ($row['installed'] == 1) {
		echo"<td><a href='?action=uninstallmod&id=".$row['id']."'>Uninstall Mod</a> | <a href='?action=deletemod&id=".$row['id']."'>Delete Mod</a></td>";
	} else {
		echo"<td><a href='?action=installmod&id=".$row['id']."'>Install Mod</a> | <a href='?action=deletemod&id=".$row['id']."'>Delete Mod</a></td>";
	}
	echo"</tr>";
}
?>
</table>
<p><strong>Install A New Mod</strong></p>
<p>Sorry, you can't yet install mods.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
