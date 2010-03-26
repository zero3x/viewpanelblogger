<?php
$idtoedit = $_POST['postid'];
$tablenameclean = $_GET['tablename'];

$sql = "SELECT post,author FROM $tablenameclean WHERE id = '$idtoedit'";
$output = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($output)

?>

<div id="apDiv1">
    <h1>Edit Posts</h1>
    <p>Made a typo in a post? Want to fix it? Look no further than this page...</p>
    <form id="form1" name="form1" method="post" action=<?php echo "lib/scripts/editpost.php?id=".$idtoedit."&tablename=".$tablenameclean.""; ?> >
      <p>1. Apply your edit:</p>
      <p>You can use HTML to form headings, tables...etc... Find out more <a href="help/usinghtml.php">here</a>.</p>
      <p>
        <label>
          <textarea name="edit" id="edit" cols="110" rows="15"><?php echo $row[post]; ?> </textarea>
        </label>
      </p>
      <p>Author / Posted By: 
        <label><input name="author" type="text" id="author" value="<?php echo $row[author]; ?>" size="80" />
        </label>
      </p>
      <p>2. 
        <label>
          <input type="submit" name="submit" id="submit" value="Edit" />
        </label>
      </p>
  </form>
</div>


