<?php
//Optimize tables
if ($_GET['action'] == "optimize") {
$alltables = mysql_query("SHOW TABLES");
while ($table = mysql_fetch_assoc($alltables))
{
   foreach ($table as $db => $tablename)
   {
       mysql_query("ANALYZE TABLE `".$tablename."`")
       or die(mysql_error());
       mysql_query("OPTIMIZE TABLE `".$tablename."`")
       or die(mysql_error());
   }
}

exit("Tables optimized");
}
?>
    <form id="form1" name="form1" method="post" action="lib/scripts/savesettings.php">
    <h1>Settings</h1>
      <p>Here you can edit some settings used in the operation of View Panel. To see the other variables you'll have to open config.php manually.      </p>
      <table style="width=:703px; height=:257px; border:1px solid;">
        <tr>
          <td height="21" colspan="2" align="center"><h2>General Settings</h2></td>
        </tr>
        <tr>
          <td width="243" height="21"><p><strong><a href="help/popups.php#url" onclick="window.open('help/popups.php#url','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> Website Address</strong>. <a href="help/popups.php#url" onclick="window.open('help/popups.php#url','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"></a></p></td>
          <td width="450"><label>
            <input name="websiteurl" type="text" id="websiteurl" value=<?php echo $siteurl; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong>Maximum File Size</strong></p></td>
          <td><input name="websiteurl2" type="text" id="websiteurl2" value="<?php echo $filesize_limit; ?>" size="70" /></td>
        </tr>
        <tr>
          <td height="21" colspan="2" align="center"><h2><strong>MySQL</strong> Settings</h2></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqluser" onclick="window.open('help/popups.php#mysqluser','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> MySQL Username</strong></p></td>
          <td><label>
            <input name="mysqlusernamenew" type="text" id="mysqlusernamenew" value=<?php echo $dbuser; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqlpass" onclick="window.open('help/popups.php#mysqlpass','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> MySQL Password</strong></p></td>
          <td><input name="mysqlpasswordnew" type="password" id="mysqlpasswordnew" value=<?php echo $decryptpass; ?> size="70" /></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqldata" onclick="window.open('help/popups.php#mysqldata','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> MySQL Database Location</strong></p></td>
          <td><label>
            <input name="databaselocation" type="text" id="databaselocation" value=<?php echo $localdatabase; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqldataname" onclick="window.open('help/popups.php#mysqldataname','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> MySQL Database Name</strong></p></td>
          <td><label>
            <input name="databasename" type="text" id="databasename" value= <?php echo $dbname; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><strong><a href="help/popups.php#optimize" onclick="window.open('help/popups.php#mysqldataname','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border="0" /></a>Optimize Tables</strong></td>
          <td height="21"><?php echo"<a href='".$_SERVER['PHP_SELF']."?page=settings&action=optimize'>Do it now</a>"; ?></td>
        </tr>
        <tr>
          <td height="21" colspan="2" align="center"><h2>Panel Settings</h2></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#filemanagerenabled" onclick="window.open('help/popups.php#filemanagerenabled','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> File Manager Enabled</strong></p></td>
          <td><label>
<input type="checkbox" <?php if (
$fileview_enabled == "enabled") {echo "checked=\"checked\"";} ?> name="fileviewer_enabled" id="fileviewer_enabled" value="enabled" />
Enabled 

          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#usermanagerenabled" onclick="window.open('help/popups.php#usermanagerenabled','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> User Manager Enabled</strong></p></td>
          <td><input type="checkbox" <?php if ($databaseview_enabled == "enabled") {echo "checked=\"checked\"";} ?> name="dbviewer_enabled" id="databaseviewer_enabled" value="enabled"/>
Enabled 
  </td>
        </tr>
        <tr>
          <td height="21"><p><strong> <a href="help/popups.php#save" onclick="window.open('help/popups.php#save','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="themes/viewpanel/images/helptopics.gif" alt="help" border=0></a> Save</strong>. </p></td>
          <td><label>
            <input type="submit" name="submit" id="submit" value="TEH L33T SAVE BUTTON!" />
          </label></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
