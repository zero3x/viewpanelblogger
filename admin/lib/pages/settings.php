
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="apDiv1">
  <div>
    <h1>Edit View Panel Settings</h1>
    <form id="form1" name="form1" method="post" action="lib/scripts/savesettings.php">
      <p>Here you can edit some settings used in the operation of View Panel. To see the other variables you'll have to open config.php manually. </p>
      <p>NOTE: You can only view the settings at the moment. You cannot change them yet.</p>
      <table width="703" height="257" border="1">
        <tr>
          <td height="21" colspan="2" align="center"><h2>General Settings</h2></td>
        </tr>
        <tr>
          <td width="243" height="21"><p><strong>Website Address</strong>. </p>
            <p>This is the link you are directed to when you click &quot;View Site&quot;</p></td>
          <td width="450"><label>
            <input name="websiteurl" type="text" id="websiteurl" value=<?php echo $siteurl; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21" colspan="2" align="center"><h2><strong>MySQL</strong> Settings</h2></td>
        </tr>
        <tr>
          <td height="21"><p><strong>MySQL Username</strong></p>
          <p>This is the username you use to connect with your MySQL database</p></td>
          <td><label>
            <input name="mysqlusernamenew" type="text" id="mysqlusernamenew" value=<?php echo $dbuser; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong>MySQL Password</strong></p>
          <p>This is the password you use to connect with your MySQL database. Password not shown for security.</p></td>
          <td><input name="mysqlpasswordnew" type="password" id="mysqlpasswordnew" value=<?php echo $decryptpass; ?> size="70" /></td>
        </tr>
        <tr>
          <td height="21"><p><strong>MySQL Database Location</strong></p>
          <p>This is the location of your database. If you're not sure ask your webhost. It's usually localhost.</p></td>
          <td><label>
            <input name="databaselocation" type="text" id="databaselocation" value=<?php echo $localdatabase; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong>MySQL Database Name</strong></p>
          <p>The name of your database. You can usually leave this as it is.</p></td>
          <td><label>
            <input name="databasename" type="text" id="databasename" value= <?php echo $dbname; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21" colspan="2" align="center"><h2>Panel Settings</h2></td>
        </tr>
        <tr>
          <td height="21"><p><strong>File Viewer Enabled</strong></p>
          <p>Enable or disable the ability to use the file viewer for all users.</p></td>
          <td><label>
<input type="checkbox" <?php if (
$fileview_enabled == "enabled") {echo "checked=\"checked\"";} ?> name="fileviewer_enabled" id="fileviewer_enabled" value="enabled" />
Enabled 

          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong>MySQL / Database Viewer Enabled</strong></p>
          <p>Enable or disable the ability to use the MySQL / database viewer for all users.</p></td>
          <td><input type="checkbox" <?php if ($databaseview_enabled == "enabled") {echo "checked=\"checked\"";} ?> name="dbviewer_enabled" id="databaseviewer_enabled" value="enabled"/>
Enabled 
  </td>
        </tr>
        <tr>
          <td height="21"><p><strong>Save</strong>. </p>
          <p>Clicking this will make View Panel remember your changes.</p></td>
          <td><label>
            <input type="submit" name="submit" id="submit" value="TEH L33T SAVE BUTTON!" />
          </label></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
  </div>
</div>
</body>
</html>