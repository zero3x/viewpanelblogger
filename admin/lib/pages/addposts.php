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

            
<h1>Add A Post		    </h1>
            
		    <form name="form1" method="post" action="lib/scripts/post.php">
            <h3>Choose A Blog </h3>
            <fieldset>
	          <p>This post will be in the 
	                <select name="page" id="page">
        <?php View_Panel_blog_lister(); ?>
                </select>
              blog</p></fieldset>
                  <fieldset>
                  <h3>Make Your Post </h3>
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
	                <label>
	                  <input name="posttitle" type="text" id="posttitle" value="Title" size="110" />
                    </label>
	              </p>
	              <p>
	                <textarea name="edit" id="edit" cols="110" rows="15">Content</textarea>
                  </p>
	              <p>
	                <input name="author" type="text" id="author" value="Author" size="80">
	              </p>
	              <p>
	                <input name="tags" type="text" id="tags" value="Tags (seperate with space)" size="80" />
	              </p>
              </fieldset>
	              <h3>Attach A File </h3>
	              <fieldset>
	                
                      <legend>
                      <label>
                        <select name="file_viewer" size="4" id="file_viewer">
                        </select>
                  </label></legend></fieldset>
	              
	                <input type="submit" name="save" id="save" value="Post">
                  </p>
	            </blockquote>
		      </label>
		    </form>
