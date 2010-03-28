<?php
$tablename = $_POST['page'];
$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
?>
    <h1>Edit Posts</h1>
    <p>Made a typo in a post? Want to fix it? Look no further than this page...</p>
    <form id="form1" name="form1" method="post" action=<?php echo "panel.php?editblog=6&tablename=".$tablenameclean.""; ?> >
      <p>1. Enter the ID of the post you want to edit: 
        <label>
          <input type="text" name="postid" id="postid" />
        </label>
      then 
      <label>
        <input type="submit" name="submit" id="submit" value="Continue" />
      </label>
      </p>
  </form>
  <?php
  $query = 'SELECT id,post,author FROM '.$tablenameclean.''; 
  $output = mysql_query($query) or die(mysql_error());
  $borderwidth = '0';

echo '<table border="1">'; 
echo '<tr>'; 
echo '<td width="85">ID</td>'; 
echo '<td width="254">Post</td>'; 
echo '<td width="76">Author</td>'; 
echo '</tr>'; 
while($row = mysql_fetch_array($output)){
echo '<tr>';
echo '<td>'.$row[id].'</td>';
echo '<td>'.$row[post].'</td>';
echo '<td>'.$row[author].'</td>';
echo '</tr>';
}
echo '</table>'; 
  ?>



