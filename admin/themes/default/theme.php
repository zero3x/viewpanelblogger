<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link rel="stylesheet" href="../admin/themes/default/styles.css" type="text/css" />
</head>
<body>

<div id="wrap">
	<div class="header">
		<div class="title">
			<h1><?php echo $blogname; ?></a></h1>
			<h2><?php echo $blogdesc; ?></h2>
		</div>
		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>

	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<p><?php out_intro(); ?></p>
					
					<p><?php out_posts(); ?></p>
				</div>
				
				<div class="sidebar">			
					<h4>Sidebar</h4>
					<p></p>
		
					<h4>Links</h4>
					<ul>
						<li><a href="index.php">Home</a></li>
		
					</ul>
					<!--<h4></h4>
					<form action="#" method="get" class="searchform">
						<p>
							<input type="text" id="searchq" name="q" />
							<input type="submit" class="formbutton" value="Search" />
						</p>
					</form>-->
			
				</div>
				
				<div class="footer">
					<p>Designed by <a href="http://www.spyka.net">Spyka Webmaster</a>. Ported to View Panel by Al Wilde. Powered by <a href="http://viewpanel.streeteye.info">View Panel</a>.</p> 
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>