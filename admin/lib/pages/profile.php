<?php 

if (isset($_POST['submit_editprofile'])) {
	$sql="UPDATE users SET firstName='".$_POST[firstname]."', lastName='".$_POST[lastname]."', email='".$_POST[email]."', age='".$_POST[age]."', gender='".$_POST[gender]."', location='".$_POST[location]."', avatar='".$_POST[avatar]."' WHERE username = '".$_GET[username]."'";
	$query = mysql_query($sql, $con );
	if (!$query) {
		echo "There was a problem saving your profile.";
	}
}
$usercheck = mysql_query("SELECT username FROM users WHERE username='".$_GET[username]."'");
if(mysql_num_rows($usercheck) == 1){    //check if user exists
if(isset($_COOKIE['View_Panel_ID'])) {
	$username = $_COOKIE['View_Panel_ID']; 
    $pass = $_COOKIE['View_Panel_Key'];
    $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check )) {
       if ($pass != $info['password']) {
		   die("You're not logged in");
       } else {
		   
		   
if (isset($_GET['username']) && (isset($_GET['action']) && ($_GET['action'] == 'editprofile'))) {
$usercheck = mysql_query("SELECT username FROM users WHERE username='".$_GET[username]."'");
if(mysql_num_rows($usercheck) == 1){
	if(isset($_COOKIE['View_Panel_ID'])) {
		if ($_COOKIE['View_Panel_ID'] != $_GET[username]) {
			die("You are not logged in");
		} else {
$query = "SELECT email,age,avatar,location,gender,firstname,lastname,rank FROM users WHERE username = '".$_GET[username]."'"; 
$output = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($output)){	 
echo "<form id='form1' name='form1' method='post' action='".$_SERVER['PHP_SELF']."?username=".$_GET[username]."'>";
echo "<p><h2>Edit Profile - $_GET[username]</h2></p>";
echo "<p><label>First Name:";
echo "<input name='firstname' type='text' id='firstname' value='$row[firstname]' size='50' maxlength='50'></label></p>";
echo "<p><label>Last Name:";
echo "<input name='lastname' type='text' id='lastname' value='$row[lastname]' size='50' maxlength='50'></label></p>";
echo "<p><label>Email:";
echo "<input name='email' type='text' id='email' value='$row[email]' size='50' maxlength='50'></label></p>";
echo "<p><label>Age:";
echo "<input name='age' type='text' id='age' value='$row[age]' size='50' maxlength='50'></label></p>";
echo "<p><label>Gender:";
echo "		  <select name='gender' id='gender'>";
echo "			<option value='Male'>Male</option>";
echo "			<option value='Female'>Female</option>";
echo "			<option value='Not Specified'>Not Specified</option>";
echo "		  </select></label></p>";
echo "<p><label>Location:";
echo "		<input name='location' type='text' id='location' value='$row[location]' size='50' maxlength='50'></label></p>";
echo "<p><label>Avatar:";
echo "		<input name='avatar' type='text' id='avatar' value='$row[avatar]' size='50'></label></p>";
echo "<p><h2>Account Settings</h2></p>";
echo "<p><label>Rank:";
echo "		<input name='rank' type='text' id='rank' value='$row[rank]' size='50'></label></p>";
echo "<h5>How do ranks work?</h5>";
echo "<p><input type='submit' name='submit_editprofile' id='submit_editprofile' value='Submit'></p>";
echo "	</form>	";	
}
} 
}
}
}
}
	}

if (isset($_GET['username']) && (!isset($_GET['action']))) {
$usercheck = mysql_query("SELECT username FROM users WHERE username='".$_GET[username]."'");
if(mysql_num_rows($usercheck) == 1){    //check if user exists
$query = "SELECT firstname, lastname, email,age,avatar,location,gender FROM users WHERE username = '".$_GET[username]."'"; 
$output = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($output)){
echo "<table align='left' border='0'>
  <tr>
    <td colspan='2'><h2>Welcome $_GET[username]</h2></td>
  </tr>
  <tr>
    <td width='271' rowspan='2'><img src='".$row['avatar']."' /></td>
    <td width='310'>First Name: ".$row[firstname]."</td>
  </tr>
  <tr>
    <td>Last Name: ".$row[lastname]."</td>
  </tr>
  <tr>";
  if ($_GET['username'] !=  $_COOKIE['View_Panel_ID']) {
		  echo ""; 
       } else if ($_GET['username'] ==  $_COOKIE['View_Panel_ID']) {
    echo "<td><a href='?username=$_GET[username]&action=editprofile'>Edit Profile</a></td>";
	   }
   echo" <td>Age: ".$row['age']."</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Gender: ".$row['gender']."</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Location: ".$row['location']."</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email: ".$row['email']."</td>
  </tr>
</table>";
}
}
}
}
}
?>