<?php
mysql_connect($GLOBALS['localdatabase'], $GLOBALS['dbuser'], $GLOBALS['decryptpass']);
mysql_select_db($GLOBALS['$dbname']);
if (isset($_GET['username']) && if (isset($_GET['action'])) {
if(isset($_COOKIE['View_Panel_ID'])) {
	$username = $_COOKIE['View_Panel_ID']; 
    $pass = $_COOKIE['View_Panel_Key'];
    $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check )) {
       if ($pass != $info['password']) {
		   die("You're not logged in");
         } else {
echo "	<form>";
echo "	<table width='829' border='0'>";
echo "	  <tr>";
echo "		<td colspan='2'>Edit Profile - $_GET['username']</td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td width='103'>First Name:</td>";
echo "		<td width='716'><label>";
echo "		  <input name='firstname' type='text' id='firstname' value='Value' size='50' maxlength='50'>";
echo "		</label></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td>Last Name:</td>";
echo "	    <td><input name='lastname' type='text' id='lastname' value='Value' size='50' maxlength='50'></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td>Email:</td>";
echo "		<td><input name='email' type='text' id='email' value='Value' size='50' maxlength='50'></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td>Age:</td>";
echo "		<td><input name='age' type='text' id='age' value='Value' size='50' maxlength='50'></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td>Gender:</td>";
echo "		<td><label>";
echo "		  <select name='gender' id='gender'>";
echo "			<option value='male'>Male</option>";
echo "			<option value='female'>Female</option>";
echo "			<option value='na'>Not Specified</option>";
echo "		  </select>";
echo "		</label></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td>Location</td>";
echo "		<td><input name='location' type='text' id='location' value='Value' size='50' maxlength='50'></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td>Avatar</td>";
echo "		<td><input name='avatar' type='text' id='avatar' value='Value' size='50' maxlength='50'></td>";
echo "	  </tr>";
echo "	  <tr>";
echo "		<td colspan='2'><label>";
echo "		  <input type='submit' name='submit' id='submit' value='Submit'>";
echo "		</label></td>";
echo "	  </tr>";
echo "	</table>";
echo "	</form>	";	
 }
}
}
} else {
	if(mysql_num_rows(mysql_query("SELECT username FROM users WHERE username='".$_GET['username']."'") == 1)){    //check if user exists
	$query = "SELECT email,age,avatar,location,gender FROM users WHERE username = '".$_GET['username']."'"; 
    $output = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($output)){
		
echo" <table width='829' border='0'>";
echo" <tr>";
echo"    <td width='216'>".$_GET[username]."</td>";
echo"    <td width='78'>Email: </td>";
echo"    <td width='521'>".$row[email]."</td>";
echo"  </tr>";
echo"  <tr>";
echo"    <td>".$row[avatar]."</td>";
echo"    <td>Gender:</td>";
echo"    <td>".$row[gender]."</td>";
echo"  </tr>";
echo"  <tr>";
echo"    <td>Edit Profile</td>";
echo"    <td>Age: </td>";
echo"   <td>".$row[age].";</td>";
echo"  </tr>";
echo"  <tr>";
echo"    <td>&nbsp;</td>";
echo"    <td>Location:</td>";
echo"    <td>".$row[location].";</td>";
echo"  </tr>";
echo"</table>";
	} 
	}
echo "Username does not exist."
?>