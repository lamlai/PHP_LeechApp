- place .htaccess file to the directory which you want to lock
- pathes to the locked directorys must be writed from the server document root directory 

new leach($pathes) - creates Leach and give to him pathes of the directorys where it must search files.
leach->setAccess() - give access to the file. It write filename to the Session vars. So he know whether user goes to it throught direct link or not.
leach->getFile($filename,$dirname) - get's the file. Where filename - name of the file and dirname - name of the locked directory from the pathes array. If it null, Leach will search file in all listed directorys.