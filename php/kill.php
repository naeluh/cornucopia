<?php 

if(isset($_POST['kill'])) {
	$run = shell_exec("sudo pkill python");
	//print $run;
	//print $kill;
	print "kill";
}