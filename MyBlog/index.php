
		<?php
		
		//BLOG CREATION VERSION 1. WRITTEN FOR VERSION 2.3 ON THE 24TH OF MARCH 2010.
		//TODO: Theme support.
		//AUTHOUR: Al Wilde.
		//This file is the basic template for all blogs. 
		//NOTE: Please use a single speech mark not a double.
		
		include('../admin/lib/config.php'); //Gets the MySQL connection and loads functions.
		
		//Output posts and author as table
		$query = 'SELECT post,author,date FROM MyBlog'; 
		$output = mysql_query($query) or die(mysql_error());
		$borderwidth = '0';
		
		echo '<link rel='stylesheet' type='text/css' href='style.css'> '
		echo '<table border=0 class='posts'>'; 
		while($row = mysql_fetch_array($output)){
		echo '<tr>';
		echo '<td>'.$row[post].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td><h5>Posted by '. $row[author] . ' on ' . $row[date]. '</h5></td>';
		echo '</tr>';
		}
		echo '<tr>';
		echo '<td><h5>Powered by View Panel.</h5></td>';
		echo '</tr>';
		echo '</table>'; 
		
		//You MAY NOT remove the \'Powered by View Panel.\' line without permission from Al Wilde. You may add on your own copyright though (EXAMPLE: Powered by View Panel with the pluginname plugin.)
		?> 