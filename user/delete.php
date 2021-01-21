<?php 
   $files = glob('har_files/*');
   foreach($files as $file){ 
     if(is_file($file)) {
       unlink($file); 
     }
   }
?>