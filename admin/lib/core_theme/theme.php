<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>View Panel CP</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="lib/core_theme/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper"><!-- Begin Wrapper -->

    <div id="preface"><!-- Begin Top Area --><!-- End Top Area Left -->
		
  <div id="right"><!-- Begin Top Area Right -->
		    <ul>
                <li>Hi <?php echo $displayname; ?>:</li>
			    <li><a href="?username=<?php echo $displayname; ?>">Edit Profile</a></li>
				<li><a href="?page=logout">Logout</a></li>
			</ul>
      </div><!-- End Top Area Right -->
		
</div><!-- End Top Area -->
	
    <div id="header">
            <div id="logo">
                <h1><a href="?page=home">View Panel</a></h1>
				<h2>A Blog Maker</h2>
            </div>
            <div id="middle">
            <p>&nbsp;</p>
            </div>
    </div>
	
     <div id="navigation" class="menu">
         <ul>
         <li><a href="?page=home">Home</a>
         <ul> <!-- Dropdown Start -->
         <li><a href="<?php echo $siteurl; ?>">View Site</a></li>
         </ul>
         </li>
         <li><a href="?page=blogmanager">Manage Blogs</a>
         <ul> <!-- Dropdown Start -->
         <li><a href="?page=addposts">Add Posts</a></li>
		 <li><a href="?page=editposts">Edit Posts</a></li>
		 <li><a href="?page=deleteposts">Delete Posts</a></li>
         <li><a href="?page=editintro">Edit Introduction</a></li>
		 <li><a href="?page=createblog">New Blog</a></li>
		 <li><a href="?page=deleteblog">Remove Blog</a></li>
         </ul> <!-- Dropdown End -->
         </li>
         <li><a href="?page=filemanager">File Manager</a></li>
         <li><a href="?page=usermanager">User Manager</a>
         <ul> <!-- Dropdown Start -->
         <li><a href="?page=register">New User</a></li>
         </ul> <!-- Dropdown End -->
         </li>
         <li><a href="?page=settings">Settings</a></li>
         <li><a href="?page=about">About</a></li>
         </ul>
         </div>

	<div id="main_content">
		<div id="main_content_header">
		</div>
			<div id="main_content_inner">
			        <?php include("lib/navs/naviagtioncontrol.php"); ?>
			</div>
		<div id="main_content_footer">
		</div>
        </div>
			
            <div id="sidebar">
			   
	            <div id="sidebar_top">
				    <div class="block block_content">
					    <div class="block_header"></div>
						<h3>Stats</h3>
						<p>Total Users: <?php get_num_users(); ?></p>
						<p>View Panel Size: <?php dirSize($directory); ?></p>
                        <div class="block_bottom"></div>
					</div>	
					<!--Sub Nav-->
	            </div>
			
	            <div id="sidebar_bottom_left">
				    <div class="block block_content">
					    <div class="block_header"></div>
				      <div class="block_bottom"></div>
					</div>
	            </div>
			
	            <div id="sidebar_bottom_right">	
				<div class="block block_content">
					    <div class="block_header"></div>
<div class="block_bottom"></div>
					</div>
	            </div>
				
            </div>
        <div style="clear: both;">&nbsp;</div>			
	
</div>
<div id="footer_bottom">

  <div id="footer_bottom_region">View Panel &copy; Al Wilde 2010 | CP theme by <a href="http://anthonylicari.com" title="Web Development, BlackBerry, Drupal, Wordpress Themes and Tutorials">Anthony Licari</a>
  | Powered by View Panel </div>

	</div>

</body>
</html>