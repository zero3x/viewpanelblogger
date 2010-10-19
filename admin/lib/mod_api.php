<?php
/* View Panel mod API */

function mod_add_tref($modname, $modauthor, $modversion, $modvpversions) {
	
}

function mod_add_page ($filename, $content) {
	$filelocation = "lib/pages/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the page ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_page)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_script ($filename, $content) {
	$filelocation = "lib/scripts/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the script ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_script)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_libfile($filname, $content) {
	$filelocation = "lib/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the script ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_libfile)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_modfile ($filename, $content) {
	$filelocation = "lib/mods/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the script ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_modfile)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_include ($filename, $fileinclude, $position) {
	if (file_exists($filename)) {
		if ($position == "end") {
			$filehandle = fopen($filename, 'a') or die ("Error appending file (mod_add_include)");
			fwrite($filehandle, $fileinclude);
			fclose($filehandle);
		} 
	} else {
		
	}
}

function mod_add_other ($filename, $filelocation, $content) {
	
}

function mod_show_login () {
	if ($_GET[loginvt] == 'yes') {
		if(!$_POST['username'] | !$_POST['pass']) {
	   return("fields");
	}
	//Prevent injection 
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['pass']);

	$check = mysql_query("SELECT * FROM users WHERE username = '".$username."'")or die(mysql_error());
	$check2 = mysql_num_rows($check);
	if ($check2 == 0) {
	  return("nouser");
		}
	while($info = mysql_fetch_array( $check )) 
	{
	$password = stripslashes($password);
	$info['password'] = stripslashes($info['password']);
	$password = md5($password);
	if ($password != $info['password']) {
	   return("incorrectpass");
	} else {
		$username = stripslashes($username); 
		$hour = time() + 3600; 
		setcookie("View_Panel_ID", $username, $hour, "/"); 
		setcookie("View_Panel_Key", $password, $hour, "/"); 
		return("true");
	}
	} else {
	echo "<form id='form1' name='form1' method='post' action='".$_SERVER['PHP_SELF']."?loginvt=yes' >
  <p>
    <label>
      Username: 
      <input name='username' type='text' id='username' maxlength='15' />
    </label>
  </p>
  <p>
    <label>
      Password: 
      <input name='pass' type='password' id='pass' maxlength='15' />
    </label>
  </p>
  <p>
    <label>
      <input type='submit' name='submit' id='submit' value='Submit' />
    </label>
  </p>
</form>";
	}
}

function mod_show_register () {
	if ($_GET[registervt] == 'yes') {
		if(!$_POST['username'] | !$_POST['pass']) {
	   return("fields");
	}
	//Prevent injection 
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['pass']);

	$check = mysql_query("SELECT * FROM users WHERE username = '".$username."'")or die(mysql_error());
	$check2 = mysql_num_rows($check);
	if ($check2 == 0) {
	  //Do stuff
		} else {
			return("exists");
		}
	while($info = mysql_fetch_array( $check )) 
	{
	$password = stripslashes($password);
	$info['password'] = stripslashes($info['password']);
	$password = md5($password);
	if ($password != $info['password']) {
	   return("incorrectpass");
	} else {
		$username = stripslashes($username); 
		$hour = time() + 3600; 
		setcookie("View_Panel_ID", $username, $hour, "/"); 
		setcookie("View_Panel_Key", $password, $hour, "/"); 
		return("true");
	}
	} else {
	echo "<form id='form1' name='form1' method='post' action='".$_SERVER['PHP_SELF']."?registervt=yes' >
  <p>
    <label>
      Username: 
      <input name='username' type='text' id='username' maxlength='15' />
    </label>
  </p>
  <p>
    <label>
      Password: 
      <input name='pass' type='password' id='pass' maxlength='15' />
    </label>
  </p>
  <p>
    <label>
      <input type='submit' name='submit' id='submit' value='Submit' />
    </label>
  </p>
</form>";
}

function mod_loadlib_external ($libloc) {
	
}
?>