<div id="apDiv1">
    <h1>Edit Posts</h1>
    <p>Made a typo in a post? Want to fix it? Look no further than this page...</p>
    <form id="form1" name="form1" method="post" action="panel.php?editblog=5">
      <p>1. Select the blog you want to edit posts in:
        <select name="page" id="page">
          <?php View_Panel_Page_Lister(); ?>
        </select>
      </p>
      <p>
        <label>
          <input type="submit" name="submit" id="submit" value="Continue" />
        </label>
      </p>
  </form>
</div>


