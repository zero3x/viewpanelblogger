<?php 
/*PLUGIN INFO */
$plugin_name = "2.4 'Pinefield' Introduction fix";
$plugin_author = "View Panel Dev [Zero3X]";
$plugin_desc = "Fixes the error with 2.4 Pinefield's introductions";
$plugin_file = "introfix.php";
$plugin_type = "run";
/*This fix is designed to fix the introduction bug in Pinefield 2.4. 
Author = Al Wilde */
//Check version, declare variables.
//This is version 2 createdon the 11th of July. It fixes the version checker.
include ("../config.php");
$action = $_GET['action'];
if ($panelversion != "2.4 \'Pinefield\'" and $panelversion != "2.4 'Pinefield'" and $action != "cakeisalie") {
	die("ERROR: You are not using View Panel 2.4 Pinefield. This script therefore refuses to run because it might explode something 0.o \n
		If a View Panel Dev has told you to run this script please click <a href='?action=cakeisalie'>here</a>.");
}
$tablename = $_POST['page'];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);
//Fix selected table.
if (isset($_POST['submit'])) {
mysql_query("UPDATE introductions SET blogname='$tablenameclean' WHERE blogname='$tablename'");
echo "<p>The blog $tablename has been fixed.</p>";
echo "<p>The Intro Hotfix has finished. You may now remove this script from the plugins directory or <a href='introfix.php'>run it again</a>.</p>";
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Panel Intro Hotfix </title>
</head>

<body>
<p>Welcome to the View Panel Intro Hotfix for View Panel 2.4 Pinefield.</p>
<h2>What This Fix Does</h2>
<p>This fix will  allow you to edit existing blogs so the introductions work on them. It's very easy to use. Just select the blog name and click submit.</p>
<h2>To Get Started</h2>
<p>Please make sure this file is your plugins directory.</p>
<h2>If You Have Multiple Blogs That Need Fixing...</h2>
<p>If this is the case simply run this script again.</p>
<h2>Config</h2>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>
    <label>Select Blog To Fix
      <select name="page" id="page">
        <?php View_Panel_blog_lister(); ?>
                    </select>
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="submit" id="submit" value="Submit" />
    </label>
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
