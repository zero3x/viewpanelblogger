<title>Delete</title><?php
/*******************************************************************************
********************************************************************************
***                                                                          ***
***   Filename: registerdelete.php                                           ***                                             
***   Use: Delete pages used during registration                             ***
***   Author: Al Wilde                                                       ***
***                                                                          ***
********************************************************************************
*******************************************************************************/

$page1 = "register.php";
$page2 = "registercomplete.php";
$page3 = "../databaseform.php";
$page4 = "../index.php";
$page5 = "../databaseconnect.php";
unlink($page1);
unlink($page2);
unlink($page3);
unlink($page4);
unlink($page5);

echo "______________________________________________________________________________  \n ";
echo "                                      STATUS REPORT                             \n ";
echo "______________________________________________________________________________  \n ";

if (file_exists($page1)) {
    echo "register.php exists. You will have to delete it manually. \n";
} else {
    echo "register.php does not exist. \n";
}

if (file_exists($page2)) {
    echo "registercomplete.php exists. You will have to delete it manually. \n";
} else {
    echo "registercomplete.php does not exist. \n";
}

if (file_exists($page3)) {
    echo "databaseform.php exists. You will have to delete it manually. \n";
} else {
    echo "databaseform.php does not exist. \n";
}

if (file_exists($page5)) {
    echo "databaseconnect.php exists. You will have to delete it manually. \n";
} else {
    echo "databaseconnect.php does not exist. \n";
}

if (file_exists($page4)) {
    echo "index.php exists. You will have to delete it manually. \n";
} else {
    echo "index.php does not exist. \n";
}

echo "The script is complete you can exit it now. \n";
echo "Thanks for running me! \n";
echo"NOTE: You'll have to delete the install folder and this script manually \n";

?> 


