<?php
session_start();

include('little_leach.php');
//pathes to the locked directorys starts from the server document root
$pathes=array(
	'img'=>'/img/',
	'files'=>'/upload/'
);


$a=new Leach($pathes);
$filename=$_REQUEST['f'];
//$filename - it's the name of the file that Leach searchs in the locked directorys
if(!array_key_exists('leach', $_SESSION) || !in_array($filename,$_SESSION['leach'])) {
	$a->setAccess($filename);
        //setAccess method set access to the file. 
        echo "<h1>File Downloading Page:</h1>";
	echo "<a href='leach.php?f=".$filename."'>Download</a>";
} else {
	header('Location: leach.php?f='.$filename);
}