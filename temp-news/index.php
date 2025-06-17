<?php
session_start();

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
    require("./app/app.php");
    $app= new App();
} else {
    $uri = 'http://';
    require("./app/app.php");
    $app= new App();
    //die("Something is wrong with the installation :-(");
}
$uri .= $_SERVER['HTTP_HOST'];
//header('Location: '.$uri.'/dashboard/');
	
?>


