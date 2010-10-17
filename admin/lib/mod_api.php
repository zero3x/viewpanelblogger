<?php
/* View Panel mod API */

function mod_add_tref($modname, $modauthor, $modversion, $modvpversions) {
	
}

function mod_add_page ($filename, $content) {
	$filelocation = "lib/pages/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the page ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_page)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_script ($filename, $content) {
	$filelocation = "lib/scripts/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the script ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_script)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_libfile($filname, $content) {
	$filelocation = "lib/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the script ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_libfile)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_modfile ($filename, $content) {
	$filelocation = "lib/mods/".$filename;
	
	if (file_exists($filelocation)) {
		echo "ERROR: A mod has already created the script ". $filelocation .". Mod install stopped";
		exit();
	} else {
		$filehandle = fopen($filelocation, 'w') or die ("Error creating page (mod_add_modfile)");
		fwrite($filehandle, $content);
		fclose($filehandle);
	}
}

function mod_add_include ($filename, $fileinclude, $position) {
	if (file_exists($filename)) {
		if ($position == "end") {
			$filehandle = fopen($filename, 'a') or die ("Error appending file (mod_add_include)");
			fwrite($filehandle, $fileinclude);
			fclose($filehandle);
		} 
	} else {
		
	}
}

function mod_add_other ($filename, $filelocation, $content) {
	
}

function mod_show_login () {
	
}

function mod_show_register () {
	
}

function mod_loadlib_external ($libloc) {
	
}
?>