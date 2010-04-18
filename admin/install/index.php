<?php 
include("../lib/functions.php");
if( isset($_GET['action']) ) {
   switch( $_GET['action'] ) {
	  case 'databaseform':
	     if (file_exists("../lib/installcomplete.txt")) {
    echo "You've already installed View Panel. Doing so again will erase all posts and settings.";
} else {
		 echo"<p>Installing View Panel is an easy 3 step process (and one of those is just clicking a button!). Please make sure you fill out all the fields and enter the correct information.</p>";
		echo"<h1><strong>Step 1 - Database Settings</strong></h1>";
		echo"<form id='form1' name='form1' method='post' action='index.php?action=databasesetup'>";
		echo"  <table width='722' border='3'>";
		echo"    <tr>";
		echo"      <td width='357'><p>Local Database Location</p>";
		echo"      <p>This is the location of the database. It's usually 'localhost'.</p></td>";
		echo"      <td width='313'><label>";
		echo"        <input name='localdatabase' type='text' id='localdatabase' value='localhost' size='50' />";
		echo"      </label></td>";
		echo"    </tr>";
		echo"    <tr>";
		echo"      <td><p>Database Name</p>";
		echo"      <p>Enter the name of the database you've created which VP should use.</p></td>";
		echo"      <td><input name='dbname' type='text' id='dbname' value='my_db' size='50' /></td>";
		echo"    </tr>";
		echo"    <tr>";
		echo"      <td>MySQL Username</td>";
		echo"      <td><input name='dbuser' type='text' id='dbuser' value='username' size='50' /></td>";
		echo"    </tr>";
		echo"    <tr>";
		echo"      <td>MySQL Password</td>";
		echo"      <td><input name='dbpass' type='password' id='dbpass' size='50' /></td>";
		echo"    </tr>";
		echo"    <tr>";
		echo"      <td>Confirm MySQL Password</td>";
		echo"      <td><label>";
		echo"        <input name='confpass' type='password' id='confpass' size='50' />";
		echo"      </label></td>";
		echo"    </tr>";
		echo"  </table>";
		echo"  <h1>Step 2 - Other Settings</h1>";
		echo"  <table width='722' border='3'>";
		echo"    <tr>";
		echo"      <td><p>Time Offset</p>";
		echo"      <p>When you make a post into your blog a time will be posted with it.      </p></td>";
		echo"      <td><label>";
		echo"     <select name='timeoffset' id='timeoffset'>";
		echo"          <option value='-39600'>GMT - 11</option>";
		echo"          <option value='-36000'>GMT - 10</option>";
		echo"          <option value='-32400'>GMT - 9</option>";
		echo"          <option value='-28800'>GMT - 8</option>";
		echo"          <option value='-25200'>GMT - 7</option>";
		echo"          <option value='-21600'>GMT - 6</option>";
		echo"          <option value='-18000'>GMT - 5</option>";
		echo"          <option value='-14400'>GMT - 4</option>";
		echo"          <option value='-10800'>GMT - 3</option>";
		echo"          <option value='-7200'>GMT - 2</option>";
		echo"          <option value='-3600'>GMT - 1</option>";
		echo"          <option value='0'>GMT </option>";
		echo"          <option value='3600'>GMT + 1</option>";
		echo"          <option value='7200'>GMT + 2</option>";
		echo"          <option value='10800'>GMT + 3</option>";
		echo"          <option value='14400'>GMT + 4</option>";
		echo"          <option value='18000'>GMT + 5</option>";
		echo"          <option value='21600'>GMT + 6</option>";
		echo"          <option value='25200'>GMT + 7</option>";
		echo"          <option value='28800'>GMT + 8</option>";
		echo"          <option value='32400'>GMT + 9</option>";
		echo"          <option value='36000'>GMT + 10</option>";
		echo"          <option value='39600'>GMT + 11</option>";
		echo"          <option value='43200'>GMT + 12</option>";
		echo"          <option value='46800'>GMT + 13</option>";
		echo"          <option value='50400'>GMT + 14</option>";
		echo"        </select>";
		echo"      </label></td>";
		echo"    </tr>";
		echo"    <tr>";
		echo"      <td><p>Site URL</p>";
		echo"        <p>This is the URL of the website you're going to be using View Panel with. If you don't know yet (like you're waiting on View Panel to make the website) just leave it as you can always change it later.</p></td>";
		echo"      <td><label>";
		echo"        <input name='siteurl' type='text' id='siteurl' size='50' />";
		echo"      </label></td>";
		echo"    </tr>";
		echo"  </table>";
		echo"  <h1>Step 3 - Create</h1>";
		echo"  <p>Hit the submit button to set up everything. It may take anything up to a few minutes. If something goes wrong an error will be returned and you'll have to click the 'back' button in your browser to come back to this page.</p>";
		echo"  <p>";
		echo"    <label>";
		echo"      <input type='submit' name='submit' id='submit' value='Submit' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>&nbsp;</p>";
		echo"</form>";
}
	  break;
	  
	  case 'databasesetup':
	  if (file_exists("../lib/installcomplete.txt")) {
    echo "You've already installed View Panel. Doing so again will erase all posts and settings.";
} else {
		 //Checks that passwords match
		if ($_POST['dbpass'] != $_POST['confpass'] ) {
			die('The passwords didn\'t match.');
		}
		//Checks all fields have been filled out
		if (!$_POST['localdatabase']  | !$_POST['dbname'] | !$_POST['dbuser'] ) {
		die('You did not complete all of the required fields. Please go back and try again.');
		}
		
		//Variables from form
		$localdatabase = $_POST["localdatabase"];
		$externaldatabase = $_POST["externaldatabase"];
		$dbname = $_POST["dbname"];
		$dbuser = $_POST["dbuser"];
		$dbpass = $_POST["dbpass"];
		$sameserver = $_POST["sameserver"];
		$timeoffset = $_POST["timeoffset"];
		 
		$tablename = $_POST["tablename"];
		$tabledesc = $_POST["tabledesc"];
		
		$websiteUrl = $_POST["siteurl"];
		
		$tablenameclean = preg_replace("/[^a-zA-Z0-9]/", "", $tablename);
		
		//Establish if they are using the local or external connection and connect.
		echo "<p>Establishing connection.</p>";
			$con = mysql_connect($localdatabase,$dbuser,$dbpass);
			if (!$con){
				die('Could not connect: ' . mysql_error());
				echo "View Panel could not connect to the database. Please go back and check your settings.";
			}
		
		//Create the tables
		echo "<p>Creating tables.</p>";
		
		mysql_select_db($dbname, $con);
		$sql = "CREATE TABLE page_lister
		(
		id mediumint(9) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
		pageName varchar(60),
		pageDesc varchar(60)
		)";
		
		mysql_query($sql,$con);
		echo "<p>Page Listing table created</p>";
		
		
		mysql_query($sql,$con);
		echo "<p>Your posts table has been created</p>";
		
		mysql_select_db($dbname, $con);
		$sql = "CREATE TABLE plugin_lister
		(
		id mediumint(9) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
		pluginname longtext,
		pluginauthor tinytext,
		fileloc longtext,
		installed tinytext
		)";
		
		mysql_query($sql,$con);
		echo "<p>Your plugins table has been created</p>";

		mysql_close($con);
		
		chmod("../lib", 0755);
		
		$installdonefile = fopen("../lib/installcomplete.txt","w");
		$surlcontent = "DO NOT DELETE ME!";
		fwrite($siteurlfile, $surlcontent);
		fclose($installdonefile);
		
		$encryptpass = base64_encode($dbpass);
		$dbfilehandle = fopen("../lib/databasesettings.php","w");
		$dbvariableshandle = "<?php\n
		\$dbuser='".$dbuser."';\n
		\$dbpass ='".$encryptpass."';\n
		\$dbname ='".$dbname."';\n
		\$localdatabase ='".$localdatabase."';\n
		\$siteurl ='".$websiteUrl."';\n
		\$timeoffset ='".$timeoffset."';\n
		\$fileview_enabled ='checked';\n
		\$databaseview_enabled ='checked';\n
		?>";
		fwrite($dbfilehandle, $dbvariableshandle); 
		fclose($dbfilehandle);
		
		echo "<p><a href='index.php?action=register'>Click here</a> to continue...</p>";
}
	  break;
	  
	  case 'register':
		 include("../lib/databasesettings.php"); 
		$decryptpass = base64_decode($dbpass);
		$con = mysql_connect($localdatabase,$dbuser,$decryptpass);
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  echo "View Panel could not connect to the database. Please try again. If the problem persists please contact tech support.";
		  }
		mysql_select_db($dbname) or die(mysql_error()); 
		
		mysql_select_db($dbname, $con);
		$sqlglitch = "CREATE TABLE users
		(
		id mediumint(9) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
		username varchar(60),
		password varchar(60),
		email varchar(60),
		firstName varchar(60),
		lastName varchar(60),
		rank varchar(60)
		)";
		
		mysql_query($sqlglitch,$con);
		echo "Users table created";
		
		if (isset($_POST['submit'])) { 
		
		if (!$_POST['username'] | !$_POST['password'] | !$_POST['password2'] | !$_POST['email'] | !$_POST['firstname'] | !$_POST['lastname'] ) {
		die('You did not complete all of the required fields. Please go back and try again.');
		}
		
		if (!get_magic_quotes_gpc()) {
		$_POST['username'] = addslashes($_POST['username']);
		}
		$usercheck = $_POST['username'];
		$check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
		or die(mysql_error());
		$check2 = mysql_num_rows($check);
		
		if ($check2 != 0) {
		die('Sorry, the username '.$_POST['username'].' is already in use.');
		}
		
		if ($_POST['password'] != $_POST['password2']) {
		die('Your passwords did not match. Please go back and try again.');
		}
		
		$_POST['password'] = md5($_POST['password']);
		if (!get_magic_quotes_gpc()) {
		$_POST['password'] = addslashes($_POST['password']);
		$_POST['username'] = addslashes($_POST['username']);
		}
		
		$insert = "INSERT INTO users (username, password, email, firstName, lastName, rank)
		VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['rank']."')";
		$add_member = mysql_query($insert);
		
		mysql_close($con);
		
		$regsiterdonefile = fopen("../lib/registerfirst.txt","w");
		$surlcontent = "The first time register has been completed. DO NOT DELETE THIS FILE!";
		fwrite($siteurlfile, $surlcontent);
		fclose($regsiterdonefile);
		
		echo"Registration complete. <a href='index.php?action=registerdone'>Click here</a> to continue";
		
		} 
		else 
		{ 
		
		echo"<h1>Step 4 - Make An Account</h1>";
		echo"<p>This form will create an admin account so you can log into View Panel. Please fill out all the fields.</p>";
		echo"<form id='form1' name='form1'  action='index.php?action=register' method='post'>";
		echo"  <p>";
		echo"    <label>";
		echo"      1. Select a user name: ";
		echo"      <input type='text' name='username' id='username' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>2. Select a password: ";
		echo"    <label>";
		echo"      <input type='password' name='password' id='password' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>3. Confirm the password: ";
		echo"    <label>";
		echo"      <input type='password' name='password2' id='password2' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>3. Please enter your email: ";
		echo"    <label>";
		echo"      <input type='text' name='email' id='email' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>4. Please enter your first name: ";
		echo"    <label>";
		echo"      <input type='text' name='firstname' id='firstname' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>5. Please enter your last name: ";
		echo"    <label>";
		echo"      <input type='text' name='lastname' id='lastname' />";
		echo"    </label>";
		echo"  </p>";
		echo"  <p>";
		echo"    <input name='rank' type='hidden' id='rank' value='1' />";
		echo"  </p>";
		echo"  <p>6. Click the ";
		echo"    <label>";
		echo"      <input type='submit' name='submit' id='submit' value='Submit' />";
		echo"    </label>";
		echo"    button.";
		echo"  </p>";
		echo"</form>";
		echo"<p>&nbsp;</p>";
		}
	  break;
	  
	  case 'registerdone':
		echo"<p>Your registration and the installation of View Panel has been completed (hopefully without a hitch).</p>";
		echo"<p>For security reasons you should delete everything in the install directory. You can do so by <a href='index.php?action=cleanup'>clicking here</a> or you could do it manually.</p>";
		echo"<p>You can login to View Panel by clicking <a href='../index.php'>here</a>.</p>";
		echo"<p>Thanks for using View Panel!</p>";
		echo"<p>- Al 'Zero3X' Wilde (Creator).</p>";
	  break;
	  
	  case 'cleanup':
	     unlink("index.php");
		 rmdir("../install");
		 if (file_exists(index.php)) {
			 echo "<p>The installer script wasn't deleted. Please delete it manually</p>.";
		  } else {
			echo "<p>The installer script was deleted.</p>";
		  }
		  echo "<p><a href='../index.php'>Go to View Panel Login</a></p>";
	  break;
   }
} else {
	echo" <p>Thanks for choosing View Panel as your blogging script. Before you install View Panel please:</p>";
	echo"<p>Create a MySQL Database which View Panel can use.</p>";
	echo"<p>Create a MySQL user and give him full permissions for that database.</p>";
	echo"<p>&nbsp;</p>";
	echo"<p>Remember, View Panel requires:</p>";
	echo"<p>A PHP 5 server and MySQL.</p>";
	echo"<p>&nbsp;</p>";
	echo"<p><a href='index.php?action=databaseform'>Click here</a> to continue...</p>";
 }

?>