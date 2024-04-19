<?php
session_start();

if(isset($_SESSION['logged']) && $_SESSION['logged']){
    // side bar 
    include_once("C:/xampp/htdocs/web_ck/web-CK/view/sideBar.php");
    // body
    if(isset($_GET['pg']) && $_GET['pg'] !=""){
        switch($_GET['pg']){
            case 'changePassword':
                header('location: ./view/changePass.php');
                break;
            case 'logout':
                session_destroy();
                header('location: view/login.php');
                break;
            case 'employee':
                include_once("./view/employee.php");
                break;
            default:
                break;
        }
    }

    //header 
    include_once("C:/xampp/htdocs/web_ck/web-CK/view/header.php");
}
else{ 
    header('location: view/login.php');
}

?>

