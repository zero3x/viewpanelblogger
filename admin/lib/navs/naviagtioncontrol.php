<?php
if ($page == "home") {
	include('lib/pages/panel.php');
	include('panelsubnav.php');
      } elseif ($page == "settings") {
		  include('lib/pages/settings.php');
		  include('lib/navs/panelsubnav.php');
	  } elseif ($page == "about") {
           include('lib/pages/about.php');
	  } elseif ($page == "blogmanager") {
		   include('lib/pages/blogmanager.php');
	  } elseif ($page == "addposts") {
           include('lib/pages/addposts.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "editposts") {
           include('lib/pages/editposts.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "deleteposts") {
           include('lib/pages/deleteposts.php');
		   include('lib/navs/editblogsubnav.php');
      } elseif ($page == "deleteposts_next") {
           include('lib/pages/deleteposts_cont.php');
		   include('lib/navs/editblogsubnav.php');
      } elseif ($page == "editposts_next") {
           include('lib/pages/editposts_cont.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "editposts_last") {
           include('lib/pages/editposts_last.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "filemanager" && $fileview_enabled == 'enabled') {
			   include('lib/pages/fileview.php');
	  } elseif ($page == "filemanager" && $fileview_enabled == 'disabled') {
               include('lib/pages/accessdenied.php');
	  } elseif ($page == "export") {
           include('lib/pages/exportfeed.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "plugins") {
           include('lib/pages/plugins.php');
		   include('lib/navs/panelsubnav.php');
	  } elseif ($page == "createblog") {
           include('lib/pages/addblog.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "deleteblog") {
           include('lib/pages/deleteblog.php');
		   include('lib/navs/editblogsubnav.php');
	  } elseif ($page == "help") {
           header('Location: help/index.php');
	  } elseif ($page == "register") {
           include('lib/pages/register.php');
		   include('lib/navs/panelsubnav.php');
	  } elseif ($page == "usermanager") {
		   include('lib/pages/usermanager.php');
	  } else {
		  include('lib/pages/error404.php');
	  }
 ?> 