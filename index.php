<?php
    
    include "view/client/header.php";
    if((isset($_GET['act'])) && ($_GET['act'] != "") ){
        $act = $_GET['act'];
        switch($act){

            case 'login':
                include "view/auth/login.php";
                break;
            
            case 'register':
                include "view/auth/register.php";
                break;
                
            case 'about':
                include "view/client/about.php";
                break;

            // case 'products':
            //     include "view/client/products.php";
            //     break;
            
            case 'contact':
                include "view/client/contact.php";
                break;

            default:
                include "view/client/home.php";
                break;
        }
    }else{
    include "view/client/home.php";}
    include "view/client/footer.php";
?>