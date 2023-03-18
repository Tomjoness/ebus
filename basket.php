<?php
 # initialize / reintialise the session 
session_start(); 

if (isset($_SESSION['basket']))
{
    $_SESSION['basket'][] = array('id' => $_GET['id'], 'quan' => $_GET['quan']) ;
}
else {
    $_SESSION['basket'] = array();
    $_SESSION['basket'][] = array('id' => $_GET['id'], 'quan' => $_GET['quan']) ;
}

print_r($_SESSION['basket']);
?>