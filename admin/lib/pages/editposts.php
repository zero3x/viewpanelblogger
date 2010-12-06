<script type="text/javascript">
<!--
function header1() {
     document.getElementById('edit').value += "<h1></h1>";
}
function header2() {
     document.getElementById('edit').value += "<h2></h2>";
}
function header3() {
     document.getElementById('edit').value += "<h3></h3>";
}
function header4() {
     document.getElementById('edit').value += "<h4></h4>";
}
function boldit() {
     document.getElementById('edit').value += "<b></b>";
}
function underline() {
     document.getElementById('edit').value += "<u></u>";
}
function italicsit() {
     document.getElementById('edit').value += "<i></i>";
}
function redit() {
     document.getElementById('edit').value += "<FONT COLOR='FF0000'></font>";
}
function greenit() {
     document.getElementById('edit').value += "<FONT COLOR='00FF00'></font>";
}
function blueit() {
     document.getElementById('edit').value += "<FONT COLOR='0000FF'></font>";
}
function purpleit() {
     document.getElementById('edit').value += "<FONT COLOR='871F78'></font>";
}
function yellowit() {
     document.getElementById('edit').value += "<FONT COLOR='FFFF00'></font>";
}
//-->
</script>
    <h1>Edit Posts</h1>
    <p>Made a typo in a post? Want to fix it? Look no further than this page...</p>
      Select Blog: 
      <select name="page" id="page" ONCHANGE="location = this.options[this.selectedIndex].value;">
        <?php View_Panel_blog_lister("blog", "action=blogselected"); ?>
                </select>
    
	
	
	<?php 
	if($_GET['action'] == 'blogselected') {
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", urldecode($_GET[blog]));
		$tablenameclean = strtolower($tablenameclean);
		$sql = "SELECT * FROM $tablenameclean";
		$result = mysql_query($sql);
		echo "<p>Select A Post: <select name='postselction' id='postselection' ONCHANGE='location = this.options[this.selectedIndex].value;'>";
		while ($row = mysql_fetch_array($result)) {
			echo "<option value='".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&blog=".urlencode($_GET['blog'])."&post=".$row[id]."&action=postselected'>".$row['posttitle']."</option>";
		} 
		echo "</select><p>";
	}
	
	if($_GET['action'] == 'postselected') {
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", urldecode($_GET[blog]));
		$tablenameclean = strtolower($tablenameclean);
		$sql = "SELECT * FROM ".$tablenameclean." WHERE id = '".$_GET['post']."'";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_array($result)) {
			$post = $row['post'];
			$author = $row['author'];
			$lasttitle = $row['posttitle'];
			$id = $row['id'];
		}
	}
	
	if($_GET['action'] == 'editsubmit') {
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", urldecode($_GET[blog]));
		$tablenameclean = strtolower($tablenameclean);
		$idtoedit = $_GET['id'];
		$editbox = nl2br($_POST['edit']);
		$editbox = mysql_real_escape_string($editbox);
		$posttitle = nl2br($_POST['posttitle']);
		$posttitle = mysql_real_escape_string($posttitle);
		$postauthor = nl2br($_POST['author']);
		$postauthor = mysql_real_escape_string($postauthor);
		$sql="UPDATE ".$tablenameclean." SET posttitle='".$posttitle."', post='".$editbox."', author='".$postauthor."' WHERE id = '".$_GET[post]."'";
		$result = mysql_query($sql);
		echo "<div class='messagebox'>Post Edited in ".$_GET[blog]."</div>";
	}
    ?>
    
    <form id='form1' name='form1' method='post' action='<?php echo "".$_SERVER['SCRIPT_NAME']."?page=".$_GET[page]."&blog=".urlencode($_GET['blog'])."&post=".$_GET[post]."&action=editsubmit"; ?>' >
      <table width="532" border="0">
	                <tr>
	                  <td width="60">Insert tag:</td>
	                  <td width="90"><select name="jumpMenu" id="jumpMenu">
	                    <option onclick="header1()">Header 1</option>
	                    <option onclick="header2()">Header 2</option>
	                    <option onclick="header3()">Header 3</option>
	                    <option onclick="header4()">Header 4</option>
                      </select></td>
	                  <td width="32"><a href="#" onclick="boldit()"><strong>Bold</strong></a></td>
	                  <td width="60"><a href="#" onclick="underline()"><u>Underline</u></a></td>
	                  <td width="41"><a href="#" onclick="italicsit()"><em>Italics</em></a></td>
	                  <td width="223"><label>
	                    <select name="color" id="color">
	                      <option onclick="redit()">Red</option>
	                      <option onclick="greenit()">Green</option>
	                      <option onclick="blueit()">Blue</option>
	                      <option onclick="yellowit()">Yellow</option>
	                      <option onclick="purpleit()">Purple</option>
                        </select>
                      </label></td>
                    </tr>
                  </table>
      <p>
        <input name="posttitle" type="text" id="posttitle" value="<?php echo $lasttitle; ?>" size="110" />
      </p>
      <p>
        <label>
          <textarea name="edit" id="edit" cols="110" rows="15"><?php echo $post; ?> </textarea>
        </label>
      </p>
      <p>Author / Posted By: 
        <label><input name="author" type="text" id="author" value="<?php echo $author; ?>" size="80" />
        </label>
      </p>
      <p>2. 
        <label>
          <input type="submit" name="submit_edit" id="submit_edit" value="Edit" />
        </label>
      </p>
  </form>



