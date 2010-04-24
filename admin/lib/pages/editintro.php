<h1>Edit A Blog Introduction</h1>
<form name="form1" method="post" action="lib/scripts/editintro.php">
		      <label>
		        <blockquote>
	              <p>This introduction will be in the 
	                <select name="page" id="page">
        <?php View_Panel_Page_Lister(); ?>
                    </select>
	              blog.</p>
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
	                <textarea name="introduction" id="introduction" cols="110" rows="15"></textarea>
	              </p>
	              <p>
	                <input type="submit" name="save" id="save" value="Post">
                  </p>
	            </blockquote>
		      </label>
		    </form>