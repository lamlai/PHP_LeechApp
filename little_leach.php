<?php
class Leach {
	var $pathes=array();
	public function __construct($pathes) {
		$this->pathes=$pathes;
	}
	public function getFile($filename,$dir='') {
		
		if(!$dir) {
			foreach($this->pathes as $k=>$v) {
				if(file_exists($_SERVER['DOCUMENT_ROOT'].$v.$filename)) {$dir=$_SERVER['DOCUMENT_ROOT'].$v;}
			}
		} else {
			$dir=$_SERVER['DOCUMENT_ROOT'].$this->pathes[$dir];
		}
		if(file_exists($dir.$filename)) {
			$_SESSION['leach']=array();
			header("Content-type: application/other");
			header("Content-Disposition: attachment; filename=".$filename);
			header("Cache-Control: must-revalidate");
                        $fp=fopen($dir.$filename,'r');
			$contents = '';
                        while (!feof($fp)) {
                            $contents=fread($fp, 1024);
                            echo $contents;
                        }
                        fclose($fp);

		} else {
			$_SESSION['leach']=array();
			echo "File doesn't exists.";
		}
	}
	public function setAccess($filename) {
		$_SESSION['leach'][]=$filename;
		return true;
	}
}