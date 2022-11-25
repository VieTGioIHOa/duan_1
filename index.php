<?php
    session_start();
    ob_start();
    include './models/danhmuc.php';
    include './models/gioitinh.php';
    include './models/sanpham.php';
    include './models/taikhoan.php';
    include './models/lienhe.php';
    include './models/gioithieu.php';
    include './models/mausac.php';
    include './models/thongke.php';
    include './models/tintuc.php';
    // include 'home.php';  
    include './view/client/header.php';
    // if(!isset($_SESSION['mycart'])){
    //     $_SESSION['mycart'] = [];
    // }
    // $listhh_in_tc = hang_hoa_select_dac_biet();
    // $listhh_yt = hang_hoa_select_top10();
    if(isset($_GET['act'])&& $_GET['act']!=""){
        $act = $_GET['act'];
        switch($act){
            /*---------------------------LOAD SẢN PHẨM----------------------------- */

           
            
            /*----------------------------------TÀI KHOẢN---------------------*/
            case 'login':
                if(isset($_POST['dangnhap'])){
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $mat_khau = $_POST['mat_khau'];
                    $check_kh = tai_khoan_check($ten_dang_nhap,$mat_khau);
                    if(is_array($check_kh)){
                        $_SESSION['user']= $check_kh;
                        header('location: index.php');
                    }else{
                        $thongbao ="Tài khoản hoặc mật khẩu không đúng!!!";  
                    }
                }
                include './view/auth/login.php';
                break;
            case 'register':
                if(isset($_POST['dangky'])){
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $ho_ten = $_POST['ho_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $email = $_POST['email'];
                    $vai_tro = $_POST['vai_tro'];
                    $img = $_FILES['anh'];
                    $imgname = $_FILES['anh']['name'];
                    $maxSize = 3000000;
                    $upload = true;
                    $dir = "./uploaded/user/";
                    $target_file = $dir . basename($img['name']);
                    $ext = pathinfo($imgname,PATHINFO_EXTENSION);
                    if(tai_khoan_exist($ten_dang_nhap)){
                        $upload = false;
                        $thongbao = "Tên đăng nhập đã tồn tại";
                    }
                    else if(tai_khoan_exist_email($email)){
                        $upload = false;
                        $thongbao = "Email này đã được đăng ký cho tài khoản khác";
                    }
                    else if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";
                    }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        tai_khoan_insert($ten_dang_nhap,$mat_khau,$ho_ten,$email,$imgname,$vai_tro);
                        $thongbao = "Tạo thành công";
                        echo "<script>
                             alert('Tạo tài khoản thành công'); 
                        </script>";
                    } 
                }
                include './view/auth/register.php';
                break;
            case 'capnhat':
                if(isset($_POST['capnhat'])){
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $ho_ten = $_POST['ho_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $email = $_POST['email'];
                    $vai_tro = $_POST['vai_tro'];
                    $hinh  = $_POST['anh'];
                    $img = $_FILES['anh'];
                    $imgname = $_FILES['anh']['name'];
                    $maxSize = 8000000;
                    $upload = true;
                    $dir = "./uploaded/user/";
                    $target_file = $dir . basename($img['name']);
                   
                    if($_FILES['anh']['size']>0 ){
                        $hinh = $_FILES['anh']['name'];   
                    }
                     $ext = pathinfo($hinh,PATHINFO_EXTENSION);
                    if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";  
                    }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        tai_khoan_update($ten_dang_nhap,$mat_khau,$ho_ten,$email,$hinh,$vai_tro);
                        $_SESSION['user']= tai_khoan_check($ten_dang_nhap,$mat_khau);
                        $thongbao = "Sửa thành công";
                        echo "<script> alert('Sửa khoản thành công'); </script>";
                    }   
                }
                include './view/auth/update.php';
                break;
            case 'quenmatkhau':
                if(isset($_POST['quenmatkhau'])){
                    $email = $_POST['email'];
                    $check_email = tai_khoan_check_email($email);
                    if(is_array($check_email)){
                        $thongbao = "Mật khẩu của bạn là: ".$check_email['mat_khau'];
                    }else{
                        $thongbao = "Email không tồn tại";
                    }
                }
                include './view/auth/forgot_pass.php';
                break;
            case 'doimatkhau':
                if(isset($_POST['doimatkhau'])){
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $mat_khau_cu = $_POST['mat_khau_cu'];
                    $mat_khau = $_POST['mat_khau_moi'];
                
                            if($_SESSION['user']['mat_khau'] == $mat_khau_cu){
                                tai_khoan_change_password($ten_dang_nhap,$mat_khau);
                                $thongbao = "Đổi mật khẩu thành công";
                            }else{
                                $thongbao = "Mật khẩu cũ không đúng";
                            }
                    
                }
                include './view/auth/change_pass.php';
                break;
            case 'dangxuat':
                session_unset();
                header('location:index.php');
                ob_end_flush();
                break;
             /*---------------------------Giỏ hàng----------------------------- */
            
            
        }
    }
    else{
        include './view/client/home.php';
    }
    include './view/client/footer.php';
