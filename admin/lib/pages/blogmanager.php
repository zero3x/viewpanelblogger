<?php if(isset($_POST['submit_settings'])) {
	$infofile = $_POST['blog_header'];
	$infofile = stripslashes($infofile);
	$tablenameclean = $_GET['blog'];
	$infofilewrite = fopen("../".$tablenameclean."/lib/header.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	echo "<div class='messagebox'>Settings Saved!</div>";
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


<h1>Blog Manager</h1>
<p>Welcome to the blog manager. Here you can you add, edit or delete posts made in any of your blogs as well as create and delete the blogs themselves. </p>
<h2>Blog Settings</h2>
<p><strong>Redirection file</strong> - this is created when you check make default blog in the blog creation page. It is created in View Panel's root directory (the directory with admin folder in) to redirect people to a blog instead of displaying a list of folders. If the box below is blank then you do not have a redirection file.</p>
<form id="form1" name="form1" method="post" <?php echo "action='".$_SERVER['SCRIPT_NAME']."?page=blogmanager'"; ?>>
  <p>
    <label>
      <textarea name="redirection_file" id="redirection_file" cols="70" rows="5"><?php readfile("../index.php"); ?>
      </textarea>
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="submit_redirection" id="submit_redirection" value="Save" />
    </label>
  </p>
</form>
<form id="form2" name="form1" method="post" <?php echo "action='".$_SERVER['PHP_SELF']."?page=blogmanager&blog=".$tablenameclean."'"; ?>>
<h2>Blog Options</h2>
<p>Blog: <select name="page" id="page" ONCHANGE="location = this.options[this.selectedIndex].value;">
      <?php View_Panel_Blog_Lister(); ?>
    </select></p>
<p>Theme: <select name="theme" id="theme">
<?php View_Panel_Theme_Lister() ?>
            </select></p>
<p>Title:
  <input name="tablename" type="text" id="tablename" size="30" maxlength="30" />
</p>
<p>Sub-Title: 
  <input name="describetable" type="text" id="describetable" size="70" maxlength="70" />
</p>
<p><strong>Blog Header</strong> - all blogs include an empty header file. You can change theme function variables here before they are outputted. This is an advanced feature and can cause output problems if incorrectly done. Blogs made before version 2.5 R2 will not have a header file.</p>
<p>
  <?php if(isset($_GET['blog'])) {
	  $tablename = $_GET['blog'];
	  $tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
      $tablenameclean = strtolower($tablenameclean);
	  } ?>
</p>
<p> 
  
  <label>
    <textarea name="blog_header" id="blog_header" cols="70" rows="5"><?php if(isset($_GET['blog'])) { readfile("../".$tablenameclean."/lib/header.php"); }
	  ?>
      </textarea>
  </label>
</p>
<p>
    <label>
      <input type="submit" name="submit_settings" id="submit_settings" value="Save" />
    </label>
  </p>
</form>
<p>&nbsp;</p>
