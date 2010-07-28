<?php
checkrank(2, "<");
?>
<h1>About View Panel</h1>
		    <h2>Tech Info</h2>
            <?php
		    echo "Using Panel Version: ".$panelversion.".<br />";
           
		    echo "Current Panel Version is ";
			$current = ("http://streeteye.info/viewpanel/versiontracker/viewpanelversiontracker.php");
			echo ".<br /><br />";
			if ($current == $panelversion) {
				echo "Your version is up to date. <br />";
			} else {
				echo "Your version <FONT 
style='BACKGROUND-COLOR: red; COLOR: white;'>is not</FONT> up to date. Please visit <a href='http://viewpanel.streeteye.info/downloads.php'>The View Panel Downloads Section</a> to find an update. <br />";
			}
            ?>
		    <h2>Credits</h2>
		    <h3>Programming</h3>
		    <p>Al Wilde</p>
		    <h3>Debuggers - Past And Present</h3>
		    <p>Al Wilde</p>
		    <p>Thomas J&oslash;ssund </p>
		    <p>&nbsp;</p>
		    <p>&nbsp;</p>
		    <p>Copyright Al Wilde 2009-2010. All rights reserved.</p>
		    <p>&nbsp;</p>

			
