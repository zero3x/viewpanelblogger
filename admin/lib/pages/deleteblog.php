<?php
if ($_GET['action'] == "execute") {
if ($_POST["sure"] == "Yes" | $_POST["sure"] == "yes") {
if (!$_POST["table"]) {
die('You did not complete all of the required fields. Please go back and try again.');
}

$tablename = $_GET[blog];
$tablename = urldecode($tablename);
$sure = $_POST["sure"];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
$tablenameclean = strtolower($tablenameclean);

$sql = "DROP TABLE $tablenameclean";
$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete table: ' . mysql_error());
}
echo "Table deleted successfully <br \>";

$sql = "DELETE FROM blog_lister WHERE pageName = '$tablename'";
$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete record from blog_lister table: ' . mysql_error());
}
echo "blog_lister record deleted successfully <br \>";

$sql = "DELETE FROM sidebars WHERE blogname = '$tablenameclean'";
$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete record from sidebars table: ' . mysql_error());
}
echo "sidebars record deleted successfully <br \>";

$sql = "DELETE FROM introductions WHERE blogname = '$tablenameclean'";
$handle = mysql_query($sql, $con );
if(!$handle)
{
  die('Could not delete record from introductions table: ' . mysql_error());
}
echo "Introductions record deleted successfully <br \>";

View_Panel_MySQL_Kill();

//Remove blog files

destroydir("../".$tablenameclean."/");

echo "<p>Blog deleted. Click <a href='../../login.php'>here</a> to return to the login page.</p>";
} else {
	echo "It seems you don't want to delete the blog as you did not type 'Yes' or 'yes' in the confirm box.";
}
}
?>
		    <h1>Delete A Blog</h1>
		    <p>Want your blog to go bye bye? Then fill out this form.</p>
		 <?php   echo "<form name='form1' method='post' action='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&blog=".$_GET['blog']."&action=execute'>"; ?>
		      <label>
		        <blockquote>
	              <p>1. 
	              Choose a blog:
	                <select name="table" id="table" ONCHANGE='location = this.options[this.selectedIndex].value;'>
	                  <?php View_Panel_blog_lister(); ?>
	                  </select>
	              </p>
	              <p>2. Are you sure you want to delete this blog (Type &quot;Yes&quot; or &quot;yes&quot;) ? 
	                <label>
	                  <input name="sure" type="text" id="sure" value="NO!" size="7" maxlength="3" />
                    </label>
	              </p>
	              <p>3. Please enter your password: 
	                <label>
	                  <input type="password" name="password_conf" id="password_conf" />
                    </label>
	              </p>
	              <p><strong>FINAL WARNING! Once you press the delete button all posts made to the blog will be erased. Also, ANY files in the blog's folder will be deleted. The files deleted will not just be ones created by View Panel, any documents you have stored in there, any plugins or themes in that directory will be destroyed. View Panel and it's creators will not take any responsibility for losses. By pressing the button below (in this form) you understand these terms.</strong>	              </p>
	              <p>
	                <input type="submit" name="save" id="save" value="Delete It!">
                  </p>
	            </blockquote>
		      </label>
		    </form>
