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


		    <h1>Add A Post</h1>
		    <p>This page allows you to easily add a post to your blog.		    </p>
		    <form name="form1" method="post" action="lib/scripts/post.php">
		      <label>
		        <blockquote>
	              <p>1. 
	              Choose a blog:
	                <select name="page" id="page">
	                  <?php View_Panel_Page_Lister(); ?>
	                  </select>
	              </p>
	              <p>2. Enter your post.	              </p>
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
	                <textarea name="edit" id="edit" cols="110" rows="15"></textarea>
                  </p>
	              <p>3. 
	                Author / Posted By - 
	                <input name="author" type="text" id="author" size="80">
	              </p>
	              <p>4.
                    <input type="submit" name="save" id="save" value="Save it!">
                  </p>
	            </blockquote>
		      </label>
		    </form>
