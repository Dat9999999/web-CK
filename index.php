<?php
session_start();

if(isset($_SESSION['logged']) && $_SESSION['logged']){
    // side bar
    include_once("./view/header.php"); 
    // body
    if(isset($_GET['pg']) && $_GET['pg'] !=""){
        switch($_GET['pg']){
            case 'changePassword':
                header('location: ./view/changePassword.php');
                break;
            case 'logout':
                session_destroy();
                header('location: view/login.php');
                break;
            case 'employee-manager':
                include_once("./view/employee-manager.php");
                break;
            case 'home':
                include_once('./view/home.php');
                break;
            default:
                break;
        }
    }
    else{
        include_once('./view/home.php');
    }

    //header 
}
else{ 
    header('location: view/login.php');
}

?>