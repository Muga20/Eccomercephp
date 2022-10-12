<?php 
$connection = mysqli_connect('localhost', 'root', '', 'ecomphp');
if(!$connection){
    echo "ERROR: Unable to connect to Mysql." .PHP_EOL;
    echo "DEBUGGING errno: " .mysqli_connect_errno() .PHP_EOL;
    echo "DEBUGGING error: " .mysqli_connect_errno() .PHP_EOL;
    exit;
}
?>