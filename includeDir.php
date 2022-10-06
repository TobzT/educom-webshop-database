<?php 
function includeOnceDir($path) {
    if(is_dir($path)){
        $dir = opendir($path);
        while(($file = readdir($dir)) !== false) {
            if($file == "." Or $file == "..") {
                continue;
            }
            include_once(($path . $file));
        }
    }
    

    // print_r($dir);
    
    

    // foreach($dir as $file) {
    //     include_once($file);
    // }
}


?>