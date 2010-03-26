<title>View Panel @: Logout</title>
<p>Logging you out...
  <?php 

/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: logout.php                                                   ***
***   Use: Logout of View Panel. Destroy cookie.                             ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/

include("../lib/config.php");
$past = time() - 3600; 
    setcookie("View_Panel_ID", " ", $past, "/"); 
    setcookie("View_Panel_Key", " ", $past, "/"); 
echo "<p>Logout complete. Click <a href='../login.php'>here</a> to return to the login page.</p>"
?> 
</p>

