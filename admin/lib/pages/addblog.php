
    <h1>Add A Blog</h1>
    <p>Before you start posting to your blog you need to create it!</p>
    <form id="form1" name="form1" method="post" action="lib/scripts/creblog.php">
      <blockquote>
        <p>1. Name your blog: 
          <label>
            <input name="tablename" type="text" id="tablename" size="30" maxlength="30" />
          </label>
        (No more than 30 chars please)</p>
        <p>2. Describe your blog: 
          <label>
            <input name="describetable" type="text" id="describetable" size="70" maxlength="70" />
          </label>
        (No more than 70 chars please).</p>
        <p>3. Choose a theme:  
          <label>
            <select name="theme" id="theme">
<?php View_Panel_Theme_Lister() ?>
            </select>
          </label>
        </p>
        <p>3
          <label>
            <input type="submit" name="submit" id="submit" value="Create" />
          </label>
        the table.</p>
      </blockquote>
    </form>
    <p>&nbsp; </p>
