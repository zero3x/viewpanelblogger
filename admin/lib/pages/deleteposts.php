
    <h1>Delete Posts</h1>
    <p>Want to get rid of a post you've made? You're on the right page...</p>
    <form id="form1" name="form1" method="post" action="panel.php?editblog=4">
      <p>1. Select the blog you want to remove posts from:
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



