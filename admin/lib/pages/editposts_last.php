<?php
/*$idtoedit = $_POST['postid'];
$tablenameclean = $_GET['tablename'];

$sql = "SELECT posttitle,post,author FROM $tablenameclean WHERE id = '$idtoedit'";
$output = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($output)
*/
?>
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
    <form id="form2" name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      Select Blog: 
      <select name="page" id="page">
        <?php View_Panel_Page_Lister(); ?>
      </select>
      <input type="submit" name="submit_blog" id="submit_blog" value="Continue" />
    </form>
    
	
	
	<?php if (!isset($_POST['submit_blog'])) {
		  $blog = $_POST['page'];
		  $sql = "SELECT posttitle FROM $blog";
		  $result = mysql_query($sql);
		  
		  while ($row = mysql_fetch_array($result)) {
			  $title = $row["posttitle"];
			  $option .= "<option value='$title'>";
		  } 
		  
		  echo"<form id='form3' name='form3' method='post' action='".$_SERVER['PHP_SELF']."?blog=".$blog."'>
		  <p>Select Post: 
		  <select name='page2' id='page2'>
		   <?php $option ?> 
		  </select> <input type='submit' name='submit_post' id='submit_post' value='Continue' /></p></form>";
	  } else {
		  echo"<form id='form3' name='form3' method='post' action=''>
		  <p>Select Post: 
		  <select name='page2' id='page2'>
		  </select></p></form>";
    ?>
      
    <?php if (!isset($_POST['submit_post'])) {
		$blog = $_GET['blog'];
		$title = $_POST['page2'];
		$sql = "SELECT id,post, posttitle, author FROM $blog WHERE posttitle='$title'";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_array($result)) {
			$post = $row['post'];
			$author = $row['author'];
			$title = $row['posttitle'];
		}
    <form id="form1" name="form1" method="post" action=<?php echo "lib/scripts/editpost.php?id=".$idtoedit."&tablename=".$tablenameclean.""; ?> >
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
        <input name="posttitle" type="text" id="posttitle" value="<?php echo $title; ?>" size="110" />
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



