<?php
$theme_name = "Multi Layer";
$theme_author = "View Panel Dev [Zero3X]";
$theme_desc = "Created by Free Website Templates, ported by Zero.";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php out_blogtitle("<title>", "</title>"); ?>
<meta name="keywords" content="multi layer, blog, free website templates, XHTML CSS" />
<meta name="description" content="Multi Layer Blog - free website template provided by templatemo.com" />
<link href="../admin/themes/multi_layer/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
</head>
<body>
<div id="templatemo_header_wrapper">

	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><?php out_blogtitle("", ""); ?><br />
                <h3><?php out_blogsubtitle("", ""); ?></h3>
            </h1>
        </div>
        
        <!--<div id="search_box">
            <form action="#" method="get">
                <input type="text" value="" name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
            </form>
        </div>-->
        
        <div class="cleaner"></div>
	</div><!-- end of header -->

    	<div id="templatemo_menu">
            <ul>
                <li><a href="#" class="current">Home</a></li>
                <li></li>
              <!--<li><a href="blog.html" class="current">Blog</a></li>-->
                <li></li>
                <li></li>
            </ul>    	
    	</div><!-- end of templatemo_menu -->

        <div id="templatemo_banner">
        
   			<?php out_intro(); ?>
            
            <!-- <div class="button"><a href="#">Read more</a></div> -->
            
        </div>

</div> <!-- end of header_wrapper -->

<div id="templatemo_content_wrapper_outer">
<div id="templatemo_content_wrapper_inner">
<div id="templatemo_content_wrapper">

    <div id="templatemo_content">
    
    	<div class="post_section">
           <?php out_posts();
 out_expanded(); ?>
    
    </div> 
    </div>
    	<!-- end of templatemo_content -->
        
        <div id="templatemo_sidebar">

           <div id="news_section">
                
                <h2>Sidebar</h2>
   
                <div class="news_box">
                    <?php out_sidebar(); ?>
                </div>
                
                <div class="cleaner"></div>  
                   
          </div>
            
            
            
            </div>
        
            <div class="cleaner"></div>
        </div> <!-- end of sidebar -->

	<div class="cleaner"></div>
</div>
</div>
</div>
        

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">

        <ul class="footer_menu">
            <li><a href="index.html">Home</a></li>
            <li class="last_menu"></li>
        </ul>
    
       <?php out_footer(); ?></div> <!-- end of footer -->

</div> <!-- end of footer_wrapper -->

</body>
</html>