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

//Set settings variables from database.
$result = mysql_query("SELECT * FROM vpmainsettings");
	while($row = mysql_fetch_array($result)) {
		$siteurl = $row['siteurl'];
		$filesize_limit = $row['uploadlimit'];
		$fileview_enabled = $row['fileviewer'];
		$databaseview_enabled = $row['usermanager'];
		$timeoffset = $row['timeoffset'];
	}
?>
    <form id="form1" name="form1" method="post" action="lib/scripts/savesettings.php">
    <h1>Settings</h1>
      <p>Here you can edit some settings used in the operation of View Panel.</p>
      <table style="width=:703px; height=:257px; border:1px solid;">
        <tr>
          <td height="21" colspan="2" align="center"><h2>General Settings</h2></td>
        </tr>
        <tr>
          <td width="243" height="21"><p><strong><a href="help/popups.php#url" onclick="window.open('help/popups.php#url','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> Website Address</strong>. <a href="help/popups.php#url" onclick="window.open('help/popups.php#url','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"></a></p></td>
          <td width="450"><label>
            <input name="websiteurl" type="text" id="websiteurl" value=<?php echo $siteurl; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><strong>Time Offset</strong></td>
          <td><select name='timeoffset' id='timeoffset'>
            <option <?php if ($timeoffset == "-39600") { echo "selected"; } ?> value='-39600'>GMT - 11</option>
            <option <?php if ($timeoffset == "-36000") { echo "selected"; } ?> value='-36000'>GMT - 10</option>
            <option <?php if ($timeoffset == "-32400") { echo "selected"; } ?> value='-32400'>GMT - 9</option>
            <option <?php if ($timeoffset == "-28800") { echo "selected"; } ?> value='-28800'>GMT - 8</option>
            <option <?php if ($timeoffset == "-25200") { echo "selected"; } ?> value='-25200'>GMT - 7</option>
            <option <?php if ($timeoffset == "-21600") { echo "selected"; } ?> value='-21600'>GMT - 6</option>
            <option <?php if ($timeoffset == "-18000") { echo "selected"; } ?> value='-18000'>GMT - 5</option>
            <option <?php if ($timeoffset == "-14400") { echo "selected"; } ?> value='-14400'>GMT - 4</option>
            <option <?php if ($timeoffset == "-10800") { echo "selected"; } ?> value='-10800'>GMT - 3</option>
            <option <?php if ($timeoffset == "-7200") { echo "selected"; } ?> value='-7200'>GMT - 2</option>
            <option <?php if ($timeoffset == "-3600") { echo "selected"; } ?> value='-3600'>GMT - 1</option>
            <option <?php if ($timeoffset == "0") { echo "selected"; } ?> value='0'>GMT </option>
            <option <?php if ($timeoffset == "3600") { echo "selected"; } ?> value='3600'>GMT + 1</option>
            <option <?php if ($timeoffset == "7200") { echo "selected"; } ?> value='7200'>GMT + 2</option>
            <option <?php if ($timeoffset == "10800") { echo "selected"; } ?> value='10800'>GMT + 3</option>
            <option <?php if ($timeoffset == "14400") { echo "selected"; } ?> value='14400'>GMT + 4</option>
            <option <?php if ($timeoffset == "18000") { echo "selected"; } ?> value='18000'>GMT + 5</option>
            <option <?php if ($timeoffset == "21600") { echo "selected"; } ?> value='21600'>GMT + 6</option>
            <option <?php if ($timeoffset == "25200") { echo "selected"; } ?> value='25200'>GMT + 7</option>
            <option <?php if ($timeoffset == "28800") { echo "selected"; } ?> value='28800'>GMT + 8</option>
            <option <?php if ($timeoffset == "32400") { echo "selected"; } ?> value='32400'>GMT + 9</option>
            <option <?php if ($timeoffset == "36000") { echo "selected"; } ?> value='36000'>GMT + 10</option>
            <option <?php if ($timeoffset == "39600") { echo "selected"; } ?> value='39600'>GMT + 11</option>
            <option <?php if ($timeoffset == "43200") { echo "selected"; } ?> value='43200'>GMT + 12</option>
            <option <?php if ($timeoffset == "46800") { echo "selected"; } ?> value='46800'>GMT + 13</option>
            <option <?php if ($timeoffset == "50400") { echo "selected"; } ?> value='50400'>GMT + 14</option>
          </select></td>
        </tr>
        <tr>
          <td height="21"><p><strong>Maximum File Size</strong></p></td>
          <td><input name="websiteurl2" type="text" id="websiteurl2" value="<?php echo $filesize_limit; ?>" size="70" /></td>
        </tr>
        <tr>
          <td height="21" colspan="2" align="center"><h2><strong>MySQL</strong> Settings</h2></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqluser" onclick="window.open('help/popups.php#mysqluser','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> MySQL Username</strong></p></td>
          <td><label>
            <input name="mysqlusernamenew" type="text" id="mysqlusernamenew" value=<?php echo $dbuser; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqlpass" onclick="window.open('help/popups.php#mysqlpass','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> MySQL Password</strong></p></td>
          <td><input name="mysqlpasswordnew" type="password" id="mysqlpasswordnew" value=<?php echo $decryptpass; ?> size="70" /></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqldata" onclick="window.open('help/popups.php#mysqldata','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> MySQL Database Location</strong></p></td>
          <td><label>
            <input name="databaselocation" type="text" id="databaselocation" value=<?php echo $localdatabase; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#mysqldataname" onclick="window.open('help/popups.php#mysqldataname','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> MySQL Database Name</strong></p></td>
          <td><label>
            <input name="databasename" type="text" id="databasename" value= <?php echo $dbname; ?> size="70" />
          </label></td>
        </tr>
        <tr>
          <td height="21"><strong><a href="help/popups.php#optimize" onclick="window.open('help/popups.php#mysqldataname','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border="0" /></a>Optimize Tables</strong></td>
          <td height="21"><?php echo"<a href='".$_SERVER['PHP_SELF']."?page=settings&action=optimize'>Do it now</a>"; ?></td>
        </tr>
        <tr>
          <td height="21" colspan="2" align="center"><h2>Panel Settings</h2></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#filemanagerenabled" onclick="window.open('help/popups.php#filemanagerenabled','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> File Manager Enabled</strong></p></td>
          <td><label>
<input type="checkbox" <?php if (
$fileview_enabled == "enabled") {echo "checked=\"checked\"";} ?> name="fileviewer_enabled" id="fileviewer_enabled" value="enabled" />
Enabled 

          </label></td>
        </tr>
        <tr>
          <td height="21"><p><strong><a href="help/popups.php#usermanagerenabled" onclick="window.open('help/popups.php#usermanagerenabled','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> User Manager Enabled</strong></p></td>
          <td><input type="checkbox" <?php if ($databaseview_enabled == "enabled") {echo "checked=\"checked\"";} ?> name="dbviewer_enabled" id="databaseviewer_enabled" value="enabled"/>
Enabled 
  </td>
        </tr>
        <tr>
          <td height="21"><p><strong> <a href="help/popups.php#save" onclick="window.open('help/popups.php#save','popup','width=500,height=500,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="lib/core_theme/help_icon.gif" alt="help" border=0></a> Save</strong>. </p></td>
          <td><label>
            <input type="submit" name="submit" id="submit" value="Save" />
          </label></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
