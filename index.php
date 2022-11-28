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
     $nam = san_pham_select_dac_biet_nam();
     $nu = san_pham_select_dac_biet_nu();
     $te = san_pham_select_dac_biet_te();
    // echo('<pre>');
    //  var_dump($nam);
    if(isset($_GET['act'])&& $_GET['act']!=""){
        $act = $_GET['act'];
        switch($act){
            /*---------------------------LOAD SẢN PHẨM----------------------------- */
            case 'sanpham_nam':
                $danh_muc_nam = danh_muc_select_nam();
                $list_san_pham_nam = [];
                foreach ($danh_muc_nam as $value) {
                    $nam_pro=san_pham_select_by_danh_muc($value['id_danh_muc']);
                    foreach($nam_pro as $item) {
                        array_push($list_san_pham_nam,$item);
                    }
                }
                include './view/client/men.php';
                break;

            case 'sanpham_nu':
                $danh_muc_nu = danh_muc_select_nu();
                $list_san_pham_nu = [];
                foreach ($danh_muc_nu as $value) {
                    $nu_pro=san_pham_select_by_danh_muc($value['id_danh_muc']);
                    foreach($nu_pro as $item) {
                        array_push($list_san_pham_nu,$item);
                    }
                }
                include './view/client/women.php';
                break;
            
            case 'sanpham_te':
                $danh_muc_te = danh_muc_select_te();
                $list_san_pham_te = [];
                foreach ($danh_muc_te as $value) {
                    $te_pro=san_pham_select_by_danh_muc($value['id_danh_muc']);
                    foreach($te_pro as $item) {
                        array_push($list_san_pham_te,$item);
                    }
                }
                include './view/client/child.php';
                break;
            case 'chitietsp':
                $id_san_pham = $_GET['id_san_pham'];
                $id_danh_muc = $_GET['id_danh_muc'];
                $san_pham = san_pham_select_by_id($id_san_pham);
                $anh_san_pham = san_pham_img_select_by_id($id_san_pham);
                $size_san_pham =san_pham_select_size($id_san_pham);
                $mau_san_pham =san_pham_select_mau($id_san_pham);

                include './view/client/single-product.php';

            /*---------------------------TIN TỨC----------------------------- */
            case 'news':
                
                include './view/client/news.php';
                break;

             /*---------------------------Giới thiệu----------------------------- */
            case 'about':
                $gioi_thieu = gioi_thieu_select_all();
                if(isset($_POST['lienhe'])){
                    $ho_ten  = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $noi_dung = $_POST['noi_dung'];
                    $ngay_bl = date_format(date_create(), 'Y-m-d');
                    lien_he_insert($ho_ten,$email,$noi_dung,$ngay_bl);
                    echo'<script language="javascript">alert("Cảm ơn bạn đã liên hệ với chúng tôi, chúng tôi sẽ sớm liện hệ lại với bạn!")</script>';
                }
                include './view/client/about.php';
                break;
            /*---------------------------LIÊN HỆ----------------------------- */
            case 'contact':
                if(isset($_POST['lienhe'])){
                    $ho_ten  = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $noi_dung = $_POST['noi_dung'];
                    $ngay_bl = date_format(date_create(), 'Y-m-d');
                    lien_he_insert($ho_ten,$email,$noi_dung,$ngay_bl);
                    echo'<script language="javascript">alert("Cảm ơn bạn đã liên hệ với chúng tôi, chúng tôi sẽ sớm liện hệ lại với bạn!")</script>';
                }
                include './view/client/contact.php';
                break;
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
            case 'add_to_cart':
                session_start();
                if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
                if(isset($_POST['add_to_cart']) && $_POST['add_to_cart']) {
                    $ten = $_POST['ten'];
                    $gia = $_POST['gia'];
                    $anh = $_POST['anh'];
                    $size = $_POST['size'];
                    $mau = $_POST['mau'];

                    $san_pham =[$ten, $gia, $anh, $size, $mau];
                    $_SESSION['cart'][] = $san_pham;
                }
                break;
            case 'cart':
                include './view/client/cart.php';
                break;
            case 'checkout':
                include './view/client/payment.php';
        }
    }
    else{
        include './view/client/home.php';
    }
    include './view/client/footer.php';
