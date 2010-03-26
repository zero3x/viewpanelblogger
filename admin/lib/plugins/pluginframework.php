<?php 
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: pluginframework.php                                          ***
***   Use: Store functions for use in plugins                                ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/

function insertbefore($stringtosearchin, $wordtofind, $stringtoinsert) {        //Insert a string before a string.
	str_replace($wordtofind,$wordtofind.$stringtoinsert,$stringtosearchin);
}

?>
