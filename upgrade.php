<?php

function checkLevel() {
  if(!is_file("config.inc.php")) {
    //echo "file exists";
    return 1;			       
  }
  else {
    return 0;
  }
}

function archive() {
  $archive_name = "archive.zip"; // name of zip file
  $archive_folder = "../cms"; // the folder which you archivate
  
  $zip = new ZipArchive; 
  if ($zip -> open($archive_name, ZipArchive::CREATE) === TRUE) 
  { 
      $dir = preg_replace('/[\/]{2,}/', '/', $archive_folder."/"); 
      
      $dirs = array($dir); 
      while (count($dirs)) 
      { 
        $dir = current($dirs); 
        $zip -> addEmptyDir($dir); 
        //echo $dir."<br>";
        $dh = opendir($dir); 
        while(false!==($file = readdir($dh))) 
        { 
            if ($file != '.' && $file != '..') 
            { 
                if (is_file($dir.$file)) 
                    $zip -> addFile($dir.$file, substr($dir.$file,3)); 
                else if (is_dir($dir.$file))
                    $dirs[] = $dir.$file."/";
            } 
        } 
        closedir($dh); 
        array_shift($dirs); 
      } 
      
      $zip -> close(); 
      echo 'Archiving is sucessful!'; 
  } 
  else 
  {
    echo 'Error, can\'t create a zip file!'; 
  } 
}

archive();

$level = 5;//checkLevel();

switch($level) {
  case 0:
    echo "Installation complete";
    break;
  case 1:
    echo "Copying the configuration files from current website<br>\n";    
    if(!copy("../cms/config.inc.php","config.inc.php")) {
      echo "Failed to copy the configuration file";
    }
    else {
      echo "Configuration files successfully copied";
    }
    break;
  case 2:
    echo "";
    break;
}
?>