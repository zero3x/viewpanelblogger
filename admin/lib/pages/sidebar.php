<?php 
if(isset($_GET[blog])) {
	$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $_GET[blog]);
    $tablenameclean = strtolower($tablenameclean);
	$sql = "SELECT sidebar FROM sidebars WHERE blogname = '$tablenameclean'";
	$query = mysql_query($sql);
	while($row = mysql_fetch_array($query)){
		$sidebar_content = stripslashes($row[sidebar]);
	}
}

if (isset($_GET[action])) {
	$sidebar_content = nl2br($_POST['edit']);
    $sidebar_content = mysql_real_escape_string($sidebar_content);
	$insert ="UPDATE sidebars SET sidebar='".$sidebar_content."' WHERE blogname='".$_GET[blog]."'";
	if (!mysql_query($insert,$con))
  {
  die('Error: ' . mysql_error());
  echo " Please try again. If this problem persists please contact tech support. ";
  }
	echo "<div class='messagebox'>Sidebar Saved!</div>";
}
	?>
    <h1>Sidebar Control</h1>
    <p>You know that bar at the side? Yeh, you edit that here.</p>
    <form id="form1" name="form1" method="post" <?php echo "action='".$_SERVER['SCRIPT_NAME']."?page=sidebar&blog=".$tablenameclean."&action=change'"; ?>>
      <p>1. What blog's that sidebar in:
        <select name="page" id="page" ONCHANGE="location = this.options[this.selectedIndex].value;">
          <?php View_Panel_Blog_Lister(); ?>
        </select>
      </p>
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
        <textarea name="edit" id="edit" cols="110" rows="15"><?php echo $sidebar_content; ?></textarea>
      </p>
      <p>
        <label>
          <input type="submit" name="submit" id="submit" value="Save" />
        </label>
      </p>
  </form>



