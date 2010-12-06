<?php
if ($_GET[action] == "execute") {
	$tablename = $_POST["tablename"];
	$tabledesc = $_POST["describetable"];
	$theme = $_POST["theme"];
	
	if (!$tablename | !$tabledesc | !$theme) {
	die('You did not complete all of the required fields. Please go back and try again.');
	}
	
	$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
	$tablenameclean = strtolower($tablenameclean);
	$tablename = addslashes($tablename);
	$tabledesc = addslashes($tabledesc);
	
	$sql="SELECT * FROM $tablenameclean";
	$result =  @mysql_query($sql);
	if ($result) {
		die ("ERROR: There is already a blog of this name. Please delete it.");
	} else {
		$blogexistcheck = false;
	}
	
	$sql="SELECT * FROM blog_lister WHERE pageName = '".$tablenameclean."'";
	$result =  @mysql_query($sql);
	if ($result) {
		if ($blogexistcheck == false) {
			die ("ERROR: View Panel has found settings for a blog of this name. However, no blog posts table exists. Please delete the record with the pageName of $tablenameclean to continue.");
		} else {
			die ("ERROR: View Panel has found settings for a blog of this name and no posts table. How did you get here?");
	}
	
	$sql = "CREATE TABLE ".$tablenameclean."
	(
	id mediumint(9) NOT NULL AUTO_INCREMENT, 
	PRIMARY KEY(id),
	posttitle longtext,
	post longtext,
	author tinytext,
	date longtext,
	tags longtext,
	attached_files longtext
	)";
	
	
	mysql_query($sql,$con);
	echo "Your posts table has been created";
	
	$query = "SELECT id FROM viewpanel_themes WHERE themename = '".$theme."'";
	$mysql = mysql_query($query,$con);
	while($row = mysql_fetch_array($mysql)) {
		$themetableid = $row['id'];
	}
	
	$insert = "INSERT INTO blog_lister (pageName, pageDesc, themeid)
	VALUES ('".$tablename."', '".$tabledesc."', '".$themetableid."')";
	mysql_query($insert,$con);
	$bloglistertableid = mysql_insert_id();
	
	$insert = "INSERT INTO introductions (blogname) VALUES ('".$tablenameclean."')";
	mysql_query($insert,$con);
	
	$insert = "INSERT INTO introductions (introduction) VALUES ('Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.') WHERE blogname='$tablenameclean'";
	$insert ="UPDATE introductions SET introduction='Thanks for choosing View Panel as your blogging script! You can now make posts into this blog as well as edit this introduction.' WHERE blogname='$tablenameclean'";
	mysql_query($insert,$con);
	
	$sidebar_content = "<ul><li>Edit</li><li>This</li><li><a href='http://mysite.com/'>Link</a></li></ul>";
	$sidebar_content = mysql_real_escape_string($sidebar_content);
	$insert = "INSERT INTO sidebars (blogname) VALUES ('".$tablenameclean."')";
	mysql_query($insert,$con);
	
	$insert = "INSERT INTO sidebars (sidebar) VALUES ('".$sidebar_content."') WHERE blogname='$tablenameclean'";
	$insert ="UPDATE sidebars SET sidebar='".$sidebar_content."' WHERE blogname='$tablenameclean'";
	mysql_query($insert,$con);
	
	
	View_Panel_MySQL_Kill();
	
	//Create index file 
	if (isset($_POST['default'])) {
	$infofile = "<?php
	header('Location: ".$tablenameclean."');
	?>";
	$infofilewrite = fopen("../../../index.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	}
	
	//Make the base blog files
	mkdir("../../../".$tablenameclean."", 0777);
	
	//Write theme include
	$infofile = "<?php
	include('lib/config.php');
	include('lib/header.php');
	include('../admin/lib/config.php');
	
	\$result = mysql_query(\"SELECT * FROM blog_lister WHERE id = '".$bloglistertableid."'\");
	while(\$row = mysql_fetch_array(\$result)) {
	\$themeid = \$row[themeid];
	}
	\$result = mysql_query(\"SELECT themelocation FROM viewpanel_themes WHERE id = '\$themeid'\");
	while(\$row = mysql_fetch_array(\$result)) {
		include(\"../admin/themes/\".\$row['themelocation'].\"/theme.php\");
	}
	?>";
	$infofilewrite = fopen("../../../".$tablenameclean."/index.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	
	
	
	//Write information file
	mkdir("../../../".$tablenameclean."/lib", 0777);
	$infofile = "<?php
	\$blogname = '".$tablename."';
	\$blogdesc = '".$tabledesc."';
	\$blogname = stripslashes(\$blogname);
	\$blogdesc = stripslashes(\$blogdesc);
	\$tablenameclean = preg_replace('/[^a-zA-Z0-9]/', '', '".$tablename."');
	\$tablenameclean = strtolower(\$tablenameclean);
	\$bloglistertableid = '".$bloglistertableid."';
	?>";
	$infofilewrite = fopen("../../../".$tablenameclean."/lib/config.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	
	//Blog header
	$infofile = "<?php
	//Header file
	?>";
	$infofilewrite = fopen("../../../".$tablenameclean."/lib/header.php","w");
	fwrite($infofilewrite, $infofile);
	fclose($infofilewrite);
	
	$url_parse = "../../../$tablenameclean/index.php";
	echo "<p>Blog Created! Click <a href='../../../".$tablenameclean."/'>here</a> to view it.</p>
	<p>Or why not use the widget below to share your new blog with the world via Facebook, Twitter and more!</p>
	<div class='a2a_kit a2a_default_style'>
	<a class='a2a_dd' href='http://www.addtoany.com/share_save?linkurl=".$url_parse."&amp;linkname='>Share</a>
	<span class='a2a_divider'></span>
	<a class='a2a_button_facebook'></a>
	<a class='a2a_button_twitter'></a>
	<a class='a2a_button_email'></a>
	<a class='a2a_button_myspace'></a>
	<a class='a2a_button_stumbleupon'></a>
	<a class='a2a_button_google_buzz'></a>
	<a class='a2a_button_bebo'></a>
	<a class='a2a_button_digg'></a>
	</div>
	<script type='text/javascript'>
	var a2a_config = a2a_config || {};
	a2a_config.linkurl = '".$url_parse."';
	</script>
	<script type='text/javascript' src='http://static.addtoany.com/menu/page.js'></script>";
}
}
?>
   
   
   
    <h1>Add A Blog</h1>
    <p>Before you start posting to your blog you need to create it!</p>
    <form id="form1" name="form1" method="post" action="lib/scripts/creblog.php">
      <blockquote>
        <p>1. Name your blog: 
          <label>
            <input name="tablename" type="text" id="tablename" size="30" maxlength="30" />
          </label>
        (No more than 30 chars please)</p>
        <p>2. Describe your blog: 
          <label>
            <input name="describetable" type="text" id="describetable" size="70" maxlength="70" />
          </label>
        (No more than 70 chars please).</p>
        <p>3. Choose a theme:  
          <label>
            <select name="theme" id="theme">
<?php View_Panel_Theme_Lister(); ?>
            </select>
          </label>
        </p>
        <p>
          <label>
            <input type="submit" name="submit" id="submit" value="Create" />
          </label>
        </p>
        <p>== Advanced ==</p>
        <p>Make default blog - Will rediect people to this blog. <strong>Check if this is your first blog</strong>!
          <label>
            <input type="checkbox" name="default" id="default" />
          </label>
        </p>
      </blockquote>
    </form>
    <p>&nbsp; </p>
