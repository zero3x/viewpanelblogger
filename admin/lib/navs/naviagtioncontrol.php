<?php
if ($page == "home") {
	include('lib/pages/panel.php');
      } elseif ($page == "settings") {
		  include('lib/pages/settings.php');
	  } elseif ($page == "about") {
           include('lib/pages/about.php');
	  } elseif ($page == "blogmanager") {
		   include('lib/pages/blogmanager.php');
	  } elseif ($page == "addposts") {
           include('lib/pages/addposts.php');
	  } elseif ($page == "editposts") {
           include('lib/pages/editposts_last.php');
	  } elseif ($page == "deleteposts") {
           include('lib/pages/deleteposts.php');
	   } elseif ($page == "editintro") {
           include('lib/pages/editintro.php');
      } elseif ($page == "deleteposts_next") {
           include('lib/pages/deleteposts_cont.php');
      } elseif ($page == "editposts_next") {
           include('lib/pages/editposts_cont.php');
	  } elseif ($page == "editposts_last") {
           include('lib/pages/editposts_last.php');
	  } elseif ($page == "filemanager" && $fileview_enabled == 'enabled') {
			   include('lib/pages/fileview.php');
	  } elseif ($page == "filemanager" && $fileview_enabled == 'disabled') {
               include('lib/pages/accessdenied.php');
	  } elseif ($page == "export") {
           include('lib/pages/exportfeed.php');
	  } elseif ($page == "plugins") {
           include('lib/pages/plugins.php');
	  } elseif ($page == "createblog") {
           include('lib/pages/addblog.php');
	  } elseif ($page == "deleteblog") {
           include('lib/pages/deleteblog.php');
	  } elseif ($page == "help") {
           include('Location: help/index.php');
	  } elseif ($page == "register" && $databaseview_enabled == 'enabled') {
           include('lib/pages/register.php');
	  } elseif ($page == "filemanager" && $databaseview_enabled == 'disabled') {
           include('lib/pages/accessdenied.php');
	  } elseif ($page == "usermanager" && $databaseview_enabled == 'enabled') {
		   include('lib/pages/usermanager.php');
	  } elseif ($page == "filemanager" && $databaseview_enabled == 'disabled') {
           include('lib/pages/accessdenied.php');
      } elseif ($page == "logout") {
		  include('lib/scripts/logout.php');
	  } elseif ($_GET['username'] == $_COOKIE['View_Panel_ID']) {
		  include('lib/pages/profile.php');
	  } else {
		  include('lib/pages/error404.php');
	  }
 ?> 