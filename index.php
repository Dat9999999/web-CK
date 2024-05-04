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
            
            case 'detail-employee':
                if(isset($_SESSION['role']) && ($_SESSION['role'] == "admin")){
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
                break;
            case 'add-staff':
                if(isset($_POST['btn-add-staff']) && ($_POST['btn-add-staff']) > 0){
                    include_once("./model/add_account.php");
                    addStaff($_POST['staff-name'], $_POST['staff-email']);
                }
                header('location: index.php?pg=employee-manager');
                break;
            case'customer':
                if(isset($_GET['id'])){
                    $_SESSION['renderDetailPurchase'] ='nok';     
                }                
                include_once("./view/customer.php");
                break;
                        
            case'products':
                include_once("./view/products.php");
                break;
            case 'add-product':
                if(isset($_POST['btnAddProduct']) && $_POST['btnAddProduct']){

                    // convert date into timestamp 
                    $_POST['creationalDate'] = DateTime::createFromFormat('Y-m-d', $_POST['creationalDate']);
                    if ($_POST['creationalDate'] === false) {
                        die("Incorrect date string");
                    } else {
                        include_once("./model/add_product.php");
                        // save new data in db
                        addProduct($_POST['productName'],$_POST['catalog'],$_POST['originalPrice'],$_POST['price'],$_POST['creationalDate']->getTimestamp(),$_POST['barcode']);
                        header('location: index.php?pg=products');
                    }
                }
                
                break;
            case'edit-product':
                if(isset($_POST['btnUpdateProduct']) && $_POST['btnUpdateProduct']){

                    // convert date into timestamp 
                    $_POST['creationalDate'] = DateTime::createFromFormat('Y-m-d', $_POST['creationalDate']);
                    if ($_POST['creationalDate'] === false) {
                        die("Incorrect date string");
                    } else {
                        include_once("./model/set_product.php");
                        // save new data in db
                        setProduct($_POST['productName'],$_POST['catalog'],$_POST['originalPrice'],$_POST['price'],$_POST['creationalDate']->getTimestamp(),$_POST['barcode'], $_POST['btnUpdateProduct']);
                        header('location: index.php?pg=products');
                    }
                }
                
                break;
            case 'del-product':
                include_once("./model/del_product.php");
                if(isset($_GET['id-product'])&&$_GET['id-product']){
                    if(deleteProduct($_GET['id-product'])){
                        header("location: index.php?pg=products");
                    }else{
                        header("location: index.php?pg=products&error=del");
                    }

                }
                break;
            case 'report':
                include_once('./view/report.php');
                break;
            case 'info':
                include_once('./view/info.php');
                break;
            case 'home':
                include_once('./view/home.php');
                break;
                
            default:
                include_once('./view/home.php');
                break;
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