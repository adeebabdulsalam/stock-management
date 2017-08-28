<?php
$link= mysqli_connect('<YOUR HOST NAME>', '<USER>', '<PASSWORD>', 'inventory');
$link2= mysqli_connect('<YOUR HOST NAME>', '<USER>', '<PASSWORD>', 'inventory_variables');
$link3= mysqli_connect('<YOUR HOST NAME>', '<USER>', '<PASSWORD>', 'inventory_renewal');

        
if(!$link || !$link2 || !$link3){
    die("Database inventory:".mysqli_error($link)."<br>Database inventory_variables"
	.mysqli_error($link2)."<br>Databse renewal".mysqli_error($link3));
}
?>