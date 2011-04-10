<?php
function checkLevel() {
  if(!is_file("config.inc.php")) {
    //echo "file exists";
    return 1;			       
  }
  else if(!is_file("archive.zip")) {
    //echo "file exists";
    return 2;			       
  }
  else if(is_dir("../INSTALL")||is_dir("../cms")) {
    return 3;
  }
  else if(!is_file("../index.php")) {
    return 4;
  }
  else if(!is_file("sqlmanipulationdone.txt")) {
    return 5;
  }
  else if(!is_dir("../cms")) {
    return 6;
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

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
}

function updatedb() {
  $sourceFolder=".";
  $uploadFolder=".";
  include "config.inc.php";
  $str = file_get_contents("sqlupdate.org");
  $str = str_replace("pragyanV2_",MYSQL_DATABASE_PREFIX,$str);

  $dbase = mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD) or die("Could not connect to server");
  mysql_select_db(MYSQL_DATABASE) or die("Could not connect to database");
  $queries = explode(";",$str);
  foreach($queries as $query) {
    $query = trim($query);
    $res = mysql_query($query);
  }
}

function copynewfiles() {
rename("cms","../cms");
rename("uploads","../cms/uploads");
copy("newindex","../index.php");
}

?>