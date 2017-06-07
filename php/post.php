<?php 



$folder = $_POST['folderInput'];
$run = exec("python ../pys/arduino_listener.py $folder");
//$run = exec("python ../pys/test.py $folder");
print $run;