
		    <h1>Delete A Blog</h1>
		    <p>Want your blog to go bye bye? Then fill out this form.</p>
		    <form name="form1" method="post" action="lib/scripts/delblog.php">
		      <label>
		        <blockquote>
	              <p>1. 
	              Choose a blog:
	                <select name="table" id="table">
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
