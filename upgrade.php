<?php

include("functions.lib.php");

//copynewfiles();
//die();

$level = checkLevel();

switch($level) {
  case 0:
    echo "Installation complete";
    break;
  case 1://copying the configuration file to the upgrade directory
    echo "Copying the configuration files from current website...<br>\n";    
    if(!copy("../cmso/config.inc.php","config.inc.php")) {
      echo "Failed to copy the configuration file";
    }
    else {
      echo "Configuration files successfully copied";
    }
    break;
  case 2://archiving the files
    echo "Archiving the files for backup...<br />";
    archive();
    break;
  case 3://deleting the old code
    echo "Deleting the old code... ";
    if(is_dir("../INSTALL/")) rrmdir("../INSTALL/");
    if(is_dir("../cmso/")) {
      rename("../cmso/uploads","./new/uploads");
      rrmdir("../cmso/");
    }
    if(is_file("../index.php")) unlink("../index.php");
    echo "Done<br>";
    break;
  case 4://putting up the under maintenance
    echo "Putting up an Under Maintenance page... ";
    copy("undermaintenance.php","../index.php");
    echo "Done";
    break;
  case 5://database manipulation
    echo "Updating the database... ";
    updatedb();
    file_put_contents("sqlmanipulationdone.txt","");
    echo "Done<br>";
    break;
  case 6://copying new files
    echo "Copying files of Pragyan CMS v3 to the cms directory... ";
    copynewfiles();
    echo "Done<br>";
    break;
  case 7://writing the config file
    echo "Writing the confiiguration file... ";
    writeconfig();
    echo "Done";
    break;
}
?>