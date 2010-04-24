<?php 


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
$query = "SELECT email,age,avatar,location,gender,firstname,lastname FROM users WHERE username = '".$_GET[username]."'"; 
$output = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($output)){	 
echo "<form>";
echo "<p>Edit Profile - $_GET[username]</p>";
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
echo "			<option value='male'>Male</option>";
echo "			<option value='female'>Female</option>";
echo "			<option value='na'>Not Specified</option>";
echo "		  </select></label></p>";
echo "<p><label>Location";
echo "		<input name='location' type='text' id='location' value='$row[location]' size='50' maxlength='50'></label></p>";
echo "<p><label>Avatar";
echo "		<input name='avatar' type='text' id='avatar' value='$row[avatar]' size='50' maxlength='50'></label></p>";
echo "<p><input type='submit' name='submit' id='submit' value='Submit'></p>";
echo "	</form>	";	
}
} 
}
}
}
}

if (isset($_GET['username']) && (!isset($_GET['action']))) {
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
$query = "SELECT email,age,avatar,location,gender FROM users WHERE username = '".$_GET[username]."'"; 
$output = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($output)){
echo "<table align='left' border='0'>
  <tr>
    <td colspan='2'>Welcome $_GET[username]</td>
  </tr>
  <tr>
    <td width='271' rowspan='2'><img>".$row['avatar']."</img></td>
    <td width='310'>First Name: ".$row['firstname']."</td>
  </tr>
  <tr>
    <td>Last Name: ".$row['lastname']."</td>
  </tr>
  <tr>
    <td><a href='?username=$_GET[username]&action=editprofile'>Edit Profile</a></td>
    <td>Age: ".$row['age']."</td>
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
}
?>