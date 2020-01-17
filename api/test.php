<?php

include_once('../config/database.php');
include_once('../config/database_old.php');

$start = microtime(true);

// the new way
$i = 0;
while($i<100){
    $database = Database::getInstance()->getConnection();
    $i++;
}
$new_time = microtime(true) - $start; // to find the duration


$start = microtime(true);
$i = 0;
while($i<100){
// the old way
    $database_old = new Database_Old();
    $database_connection = $database_old->getConnection();
    $i++;
}

$old_time = microtime(true) - $start;

printf('New Connection takes ==> $s ms'.PHP_EOL, $new_time*1000);
printf('Old Connection takes ==> $s ms'.PHP_EOL, $old_time*1000);
printf('You have saved $s ms'.PHP_EOL, ($old_time - $new_time)*1000);
printf('New Connection only takes %s%% of Old Connection'.PHP_EOL, ($new_time/$old_time)*100);
// printf means format
// %s is used as a placeholder, gets replaced with later parameters