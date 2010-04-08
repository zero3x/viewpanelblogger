<?php include ("lib/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link rel="stylesheet" href="styles.css" type="text/css" />
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
				<li><a href="index.html">Home</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>

	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<!--<h3>Introduction</h3>
					<p>Welcome to golf, a free valid CSS &amp; XHTML strict web template from <a href="http://www.spyka.net" title="spyka webmaster">spyka Webmaster</a>. This template is <strong>free</strong> to use permitting a link remains back to  <a href="http://www.spyka.net" title="spyka webmaster">http://www.spyka.net</a>. Should you wish to use this template unbranded you can buy a template license from our website for £4.00, this will allow you remove all branding related to our site, for more information about this see below.</p>-->
					
					<p><?php out_posts(); ?></p>
				</div>
				
				<!--<div class="sidebar">			
					<h4>About us</h4>
					<p>A little bit of information about your website, what you do, what's on offer and why visitors should stick around</p>
		
					<h4>Links</h4>
					<ul>
						<li><a href="http://www.spyka.net" title="spyka Webmaster resources">spyka webmaster</a></li>
						<li><a href="http://www.justfreetemplates.com" title="free web templates">JustFreeTemplates</a></li>
						<li><a href="http://www.spyka.net/forums" title="webmaster forums">Webmaster forums</a></li>
						<li><a href="http://www.profileartist.net" title="premium templates">Premium templates</a></li>
		
						<li><a href="http://www.awesomestyles.com" title="free forum skins and templates">Forum resources</a></li>
		
					</ul>
					<h4>Search</h4>
					<form action="#" method="get" class="searchform">
						<p>
							<input type="text" id="searchq" name="q" />
							<input type="submit" class="formbutton" value="Search" />
						</p>
					</form>
			
				</div>-->
				
				<div class="footer">
					<p>Designed by <a href="http://www.spyka.net">Spyka Webmaster</a>. Ported to View Panel by Al Wilde. Powered by <a href="http://viewpanel.streeteye.info"View Panel</p> 
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>