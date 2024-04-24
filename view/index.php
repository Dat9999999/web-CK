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
            
            // case 'detail-employee':
            //     include_once("./view/detail-employee.php");
            //     break;

            case 'add-staff':
                if(isset($_POST['btn-add-staff']) && ($_POST['btn-add-staff']) > 0){
                    include_once("./model/add_account.php");
                    addStaff($_POST['staff-name'], $_POST['staff-email']);
                }
                header('location: index.php?pg=employee-manager');
                break;

            case'products':
                include_once("./view/products.php");
                break;
            case 'report':
                include_once('./view/report.php');
                break;
            case 'home':
                include_once('./view/home.php');
                break;
                
            default:
                break;
        }
    }
    else if(isset($_SESSION['role']) && ($_SESSION['role'] == "admin")){
        if(isset($_GET['detail-employee']) && $_GET['detail-employee'] !=""){
            $_SESSION['detail-name-staff'] = $_GET['detail-employee'];
            include_once("./view/detail-employee.php");
        }
        else if(isset($_GET['resend-email']) && $_GET['resend-email'] !=""){
            include_once("./model/send_mail.php");
            resendMail($_GET['resend-email']);
            include_once("./view/detail-employee.php");
        }
        else if((isset($_GET['lock-or-unlock']) && $_GET['lock-or-unlock'] !="") && (isset($_GET['src']) && $_GET['src'] !="")){
            include_once("./model/set_account.php");
            setLockOrUnlock($_GET['lock-or-unlock'], $_GET['src']);
            include_once("./view/detail-employee.php");

        }
    }
    else{
        include_once('./view/home.php');
    }
    
}
else if(isset($_GET['token']) && $_GET['token'] !=""){
    header('location: view/first_login.php');
}
else{ 
    header('location: view/login.php');
}

?>