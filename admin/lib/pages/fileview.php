<?php
if (isset($_GET['action'])) {
	$fileid = $_GET['id'];
	$sql = "SELECT fileName, fileType FROM upload_files WHERE id ='".$fileid."'";
    $sql = mysql_query($sql);
	while($row = mysql_fetch_array($sql))
       {
	$filelocation = "uploads/".$row['fileType']."/".$row['fileName']."";
	   }
	   unlink($filelocation);
	   $sql = "DELETE FROM upload_files WHERE id ='".$fileid."'";
	   mysql_query($sql);
	   exit("File deleted");
}

if(isset($_POST['submit'])){
    if ($_FILES['upload']['tmp_name'] == "none") {
		echo "Error uploading file";
		exit();
	} else {
		$number = rand(0,99999999);
		$filename_new = "".$number."".$_FILES['upload']['name']."";
		$upload_to = "uploads/".$_POST['file_type']."/".$filename_new."";
        $temp_file = $_FILES['upload']['tmp_name'];
        move_uploaded_file($temp_file,$upload_to);
		$fileSize_var = "";
		$sql="INSERT INTO upload_files (fileType, fileName, fileSize, fileUploader)
  VALUES('".$_POST['file_type']."','".$filename_new."','".$fileSize_var."','".$_COOKIE['View_Panel_ID']."')";
  mysql_query($sql,$con);
        echo "<p>File Uploaded</p>";
        echo "<p>LINK: <a href='uploads/".$_POST['file_type']."/".$filename_new."'>".$_FILES['upload']['name']."</a></p>";
	}
} else {
echo "<form action='".$_SERVER['PHP_SELF']."?page=filemanager' method='post' enctype='multipart/form-data' name='form1' id='form1'>";
echo "<h1>File Manager</h1>";
echo "<h3>Files On Server</h3>";
  $query = 'SELECT id,fileType,fileName, fileSize, fileUploader, fileDate FROM upload_files'; 
  $output = mysql_query($query) or die(mysql_error());
echo "<table width='829' border='0'>";
echo "    <tr>";
echo "      <td width='108'><h3>Type</h3></td>";
echo "      <td width='153'><h3>File Name</h3></td>";
echo "      <td width='111'><h3>Size</h3></td>";
echo "      <td width='145'><h3>Uploader</h3></td>";
echo "      <td width='121'><h3>Date Uploaded</h3></td>";
echo "      <td width='165'><h3>Actions</h3></td>";
echo "    </tr>";
	while($row = mysql_fetch_array($output)){
echo "    <tr>
      <td>".$row[fileType]."</td>
      <td><a href='uploads/".$row[fileType]."/".$row[fileName]."'>".$row[fileName]."</a></td>
      <td>".$row[fileSize]."</td>
      <td><a href='?username=".$row[fileUploader]."'>".$row[fileUploader]."</td>
      <td>".$row[fileDate]."</td>
      <td><a href='".$_SERVER['PHP_SELF']."?page=filemanager&action=delete&id=".$row[id]."'>Delete</a></td>
    </tr>";
	}
echo "  </table>
<h3>Upload File</h3>
<p>
  <label>
    <input name='file_type' type='radio' id='file_type_0' value='Avatar' checked='checked' />
    Avatar</label>
  <br />
  <label>
    <input type='radio' name='file_type' value='File' id='file_type_1' />
    File</label>
  <br />
</p>
  <p>
    <label>
      <input type='file' name='upload' id='upload' /><label>
      <input type='submit' name='submit' id='submit' value='Submit'>
    </label>
    </label>
  </p>
</form>
";
}
?>

