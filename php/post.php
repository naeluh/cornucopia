<?php 
//$folder = $_POST['folderInput'];
//$kill = $_POST['kill'];
//$run = shell_exec("/usr/bin/python ../pys/arduino_listener.py " . $folder);
//$run = exec("python ../pys/test.py $folder");
//print $run;
//print $folder;
//print shell_exec( 'whoami' );


if(isset($_POST['folderInput']) && !empty($_POST['folderInput'])) {
	$folder = str_replace(' ', '_',$_POST['folderInput']);;
	$run = shell_exec("/usr/bin/python ../pys/arduino_listener.py " . $folder);
	print $run;
}  else {
	$run = shell_exec("sudo pkill python");
	print $run;
}