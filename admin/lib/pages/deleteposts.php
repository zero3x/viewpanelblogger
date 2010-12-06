
    <h1>Delete Posts</h1>
    <p>Want to get rid of a post you've made? You're on the right page...</p>
         Select Blog: 
      <select name="page" id="page" ONCHANGE="location = this.options[this.selectedIndex].value;">
        <?php View_Panel_blog_lister("blog", "action=blogselected"); ?>
                </select>
    
	
	
	<?php 
	if($_GET['action'] == 'blogselected' or $_GET['action'] == 'postselected') {
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $_GET[blog]);
		$tablenameclean = strtolower($tablenameclean);
		$sql = "SELECT posttitle, id FROM $tablenameclean";
		$result = mysql_query($sql);
		echo "<p>Select A Post: <select name='postselction' id='postselection' ONCHANGE='location = this.options[this.selectedIndex].value;'>";
		echo "<option></option>";
		while ($row = mysql_fetch_array($result)) {
			echo "<option value='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&blog=".$_GET['blog']."&post=".$row[id]."&action=postselected'>".$row['posttitle']."</option>";
		} 
		echo "</select><p>";
	}
	
	if($_GET['action'] == 'deletepost') {
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $_GET[blog]);
		$tablenameclean = strtolower($tablenameclean);
		$sql = "DELETE FROM $tablenameclean WHERE id = '".$_GET['id']."'";
		$result = mysql_query($sql);
		echo "<div class='messagebox'>Post Deleted</div>";
	}
	
	if($_GET['action'] == 'postselected') {
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $_GET[blog]);
		$tablenameclean = strtolower($tablenameclean);
		$sql = "SELECT * FROM ".$tablenameclean." WHERE id = ".$_GET['post']."";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_array($result)) {
			$post = $row['post'];
			$author = $row['author'];
			$lasttitle = $row['posttitle'];
			$id = $row['id'];
		}
		echo "<p>".$lasttitle." in ".$_GET['blog']." is the currently selected post</p>";
		echo "<p><a href='../".$tablenameclean."/index.php?postid=".$id."'>View Post Live</a></p>";
		echo "<p<a href='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&action=deletepost&blog=".$tablenameclean."&id=".$id."'>Delete Post</a></p>";
	}
    ?>



