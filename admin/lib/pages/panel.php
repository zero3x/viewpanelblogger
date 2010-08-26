<h1>Welcome to View Panel</h1>
<?php
$current = file_get_contents('http://streeteye.info/viewpanel/versiontracker/viewpanelversiontracker.php');
			if ($current == $panelversion) {
			} else {
				echo "<div class='messagebox'>Your View Panel version is out of date!</div>";
			}
readfile('http://streeteye.info/viewpanel/news/newsfeed_current.xml'); ?>
