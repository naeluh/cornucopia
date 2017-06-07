<?php 


$title = "Some title";
$message = "some message";
$command = "/path/to/script/primes.py -t $title -m $message";
exec($command);