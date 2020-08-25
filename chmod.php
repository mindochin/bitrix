<?php
define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0755);


function chmod_R($path) {

   $handle = opendir($path);
   while ( false !== ($file = readdir($handle)) ) {
     if ( ($file !== ".") && ($file !== "..") ) {
       if ( is_file($path."/".$file) ) {
         chmod($path . "/" . $file, BX_FILE_PERMISSIONS);
       }
       else {
         chmod($path . "/" . $file, BX_DIR_PERMISSIONS);
         chmod_R($path . "/" . $file);
       }
     }
	 // echo $path;
   }
   closedir($handle);
}

$path=dirname(__FILE__);
umask(0);
chmod_R($path);
echo $path;
?>
