<?php
define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0755);
define("BX_USER", 'admin');
define("BX_GROUP", 'admin');

function chmod_R($path) {

   $handle = opendir($path);
   while ( false !== ($file = readdir($handle)) ) {
     if ( ($file !== ".") && ($file !== "..") ) {
       if ( is_file($path."/".$file) ) {
         chmod($path . "/" . $file, BX_FILE_PERMISSIONS);
	//			 chown($path, BX_USER);
	//			 chgrp($path, BX_GROUP);
       }
       else {
         chmod($path . "/" . $file, BX_DIR_PERMISSIONS);
	//			 chown($path, BX_USER);
	//			 chgrp($path, BX_GROUP);
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
