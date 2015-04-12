<?php
ini_set('max_execution_time','36000');
session_start();

include('little_leach.php');
//pathes to the locked directorys starts from the server document root
$pathes=array(
	'img'=>'/img/',
	'files'=>'/upload/'
);
$a=new Leach($pathes);
//$filename - it's the name of the file that Leach searchs in the locked directorys
$filename=$_REQUEST['f'];
if(!$filename) die("File doesn't exists");
	if(array_key_exists('leach',$_SESSION) && in_array($filename,$_SESSION['leach'])) {
		$a->getFile($filename);
                //also you can get file from the specified directory
                //like that $a->getFile($filename,'img');
                //where 'img' is the name of the path;
	} else {
		die("You don't have permission.");
	}

