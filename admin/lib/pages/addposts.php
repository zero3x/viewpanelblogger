
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
	              <p>2. Enter your post.                  </p>
	              <p>You can use HTML to form headings, tables...etc... Find out more <a href="help/usinghtml.php">here</a>.</p>
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
