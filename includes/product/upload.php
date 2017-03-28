 <?php

error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
 
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = "..".$ds."..".$ds.'assets'.$ds."files".$ds."products";   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    
    #/var/www/html/assets/files/products/ 
    $targetPath = dirname( __FILE__ ) . $ds . $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath . $_FILES['file']['name'];  //5
    $targetFile1=$_FILES['file']['name']; 
    move_uploaded_file($tempFile,$targetFile); //6   
    echo $targetFile1;
}
?> 
