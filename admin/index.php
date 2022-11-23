<?php
include 'header.php';
include '../models/danhmuc.php';
include '../models/gioitinh.php';
include '../models/sanpham.php';
include '../models/taikhoan.php';
include '../models/lienhe.php';
include '../models/gioithieu.php';
include '../models/mausac.php';
include '../models/thongke.php';
include '../models/tintuc.php';
// include '../models/binhluan.php';
// include '../models/cart.php';

     /*------------------------THỐNG KÊ---------------------- */
     $list_thongke = load_all_thongke();
     
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            /* ------------------------DANH MỤC -----------------------*/
        case 'adddm':
            if (isset($_POST['themmoi'])) {
                $id_gioi_tinh = $_POST['id_gioi_tinh'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                danh_muc_insert($ten_danh_muc, $id_gioi_tinh);
                $thongbao = "Thêm thành công";
            }
            $list_gt = gioi_tinh_select_all();
            include 'danh_muc/add.php';
            break;
        case 'listdm':
            $list = danh_muc_select_all();
            include 'danh_muc/list.php';
            break;
        case 'xoadm':
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $id_danh_muc = $_GET['id_danh_muc'];
                $xoa = danh_muc_delete($id_danh_muc);
                $thongbao = "Xóa thành công";
            }
            $list = danh_muc_select_all();
            include 'danh_muc/list.php';
            break;
        case 'suadm':
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $dm = danh_muc_select_by_id($_GET['id_danh_muc']);
            }
            include 'danh_muc/update.php';
            break;
        case 'updm':
            if (isset($_POST['capnhat'])) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                danh_muc_update($id_danh_muc, $ten_danh_muc);
                $thongbao = "Sửa thành công";
            }
            $list = danh_muc_select_all();
            include 'danh_muc/list.php';
            break;

            /* ------------------------SẢN PHẨM -----------------------*/
        case 'addsp':
            if (isset($_POST['themmoi'])) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $id_kich_co = $_POST['id_kich_co'];
                $id_mau_sac = $_POST['id_mau_sac'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $giam_gia = $_POST['giam_gia'];
                $dac_biet = $_POST['dac_biet'];
                $dac_diem = $_POST['dac_diem'];
                $so_luong = $_POST['so_luong'];
                $mo_ta = $_POST['mo_ta'];
                $img = $_FILES['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 8000000; /*byte sang mb*/
                $upload = true;
                $dir = "../uploaded/images/";
                $target_file = $dir . basename($img['name']);
                $ext = pathinfo($imgname, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    san_pham_insert($ten_san_pham, $imgname, $mo_ta, $gia, $giam_gia, $so_luong, $dac_biet,$dac_diem, $id_danh_muc, $id_kich_co, $id_mau_sac);
                    $thongbao = "Thêm thành công";             
                }
                var_dump($id_kich_co);
            }
            $listdanhmuc = danh_muc_select_all();
            $listkichco = kich_co_select_all();
            $listmausac = mau_sac_select_all();
            include 'sanpham/add.php';
            break;
        case 'listhh':
            $listhh = san_pham_select_alls();
            include 'sanpham/list.php';
            break;
        case 'xoahh':
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $id_san_pham = $_GET['id_san_pham'];
                $xoa = san_pham_delete($id_san_pham);
                $thongbao = "Xóa thành công";
            }
            $listhh = san_pham_select_alls();
            include 'sanpham/list.php';
            break;
        case 'suasp':
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $hh = san_pham_select_by_id($_GET['id_san_pham']);
            }
            $hang_hoa_info = san_pham_select_by_id($_GET['id_san_pham']);
            $listdm = danh_muc_select_all();
            $listkichco = kich_co_select_all();
            $listmausac = mau_sac_select_all();
            include 'sanpham/update.php';
            break;
        case 'upsp':
            if (isset($_POST['capnhat'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $id_danh_muc = $_POST['id_danh_muc'];
                $id_kich_co = $_POST['id_kich_co'];
                $id_mau_sac = $_POST['id_mau_sac'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $giam_gia = $_POST['giam_gia'];
                $dac_biet = $_POST['dac_biet']; 
                $dac_diem = $_POST['dac_diem'];        
                $so_luong = $_POST['so_luong'];
                $mo_ta = $_POST['mo_ta'];
                $img = $_FILES['anh'];
                $hinh = $_POST['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 8000000; /*byte sang mb*/
                $upload = true;
                $dir = "../uploaded/images/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['anh']['size'] > 0) {
                    $hinh = $_FILES['anh']['name'];
                }
                $ext = pathinfo($hinh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                // if (file_exists($target_file)) {
                //     $upload = false;
                //     $thongbao = "Tên file đã tồn tại trên server, không được ghi đè";
                // }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    san_pham_update($id_san_pham, $ten_san_pham, $hinh, $mo_ta, $gia, $giam_gia, $so_luong, $dac_biet,$dac_diem, $id_danh_muc, $id_kich_co, $id_mau_sac);
                    $thongbao = "Sửa thành công";
                }
            }

            $listhh = san_pham_select_alls();
            include 'sanpham/list.php';
            break;

            /*------------------------KHÁCH HÀNG---------------------- */
        case 'addtk':
            if (isset($_POST['themmoi'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau2 = $_POST['mat_khau2'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $img = $_FILES['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 300000;
                $upload = true;
                $dir = "../uploaded/user/";
                $target_file = $dir . basename($img['name']);
                $ext = pathinfo($imgname, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($mat_khau != $mat_khau2) {
                    $upload = false;
                    $thongbao = "Nhập lại mật khẩu không đúng";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tai_khoan_insert($ten_dang_nhap, $mat_khau, $ho_ten, $email, $imgname, $vai_tro);
                    $thongbao = "Thêm thành công";
                }
            }
            include 'taikhoan/add.php';
            break;
        case 'listtk':
            $listkh = tai_khoan_select_all();
            include 'taikhoan/list.php';
            break;
        case 'xoatk':
            if (isset($_GET['id_tai_khoan'])) {
                $id_tai_khoan = $_GET['id_tai_khoan'];
                $xoa = tai_khoan_delete($id_tai_khoan);
                $thongbao = "Xóa thành công";
            }
            $list = tai_khoan_select_all();
            include 'taikhoan/list.php';
            break;
        case 'suatk':
            if (isset($_GET['id_tai_khoan'])) {
                $tk = tai_khoan_select_by_id($_GET['id_tai_khoan']);
            }
            $listkh = tai_khoan_select_all();
            include 'taikhoan/update.php';
            break;
        case 'uptk':
            if (isset($_POST['capnhat'])) {
                $id_tai_khoan = $_POST['id_tai_khoan'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau2 = $_POST['mat_khau2'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $anh  = $_POST['hinh'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $maxSize = 3000000;
                $upload = true;
                $dir = "../uploaded/user/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['hinh']['size'] > 0) {
                    $anh = $imgname;
                }
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($mat_khau != $mat_khau2) {
                    $upload = false;
                    $thongbao = "Nhập lại mật khẩu không đúng";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tai_khoan_update($id_tai_khoan, $mat_khau, $ho_ten, $email, $anh, $vai_tro);
                    $thongbao = "Sửa thành công";
                }
            }
            $listkh = tai_khoan_select_all();
            include 'taikhoan/list.php';
            break;

            /* ------------------------LIÊN HỆ -----------------------*/
        case 'listlh':
            $list = lien_he_select_all();
            include 'lienhe/list.php';
            break;
        case 'xoalh':
            if (isset($_GET['id_lien_he'])) {
                $id_lien_he = $_GET['id_lien_he'];
                $xoa = lien_he_delete($id_lien_he);
                $thongbao = "Xóa thành công";
            }
            $list = lien_he_select_all();
            include 'lienhe/list.php';
            break;

            /* ------------------------GIỚI THIỆU -----------------------*/
        case 'listgt':
            $list = gioi_thieu_select_all();
            include 'gioi_thieu/list.php';
            break;
        case 'suagt':
            if (isset($_GET['id_gioi_thieu'])) {
                $tk = gioi_thieu_select_by_id($_GET['id_gioi_thieu']);
            }
            $list = gioi_thieu_select_all();
            include 'gioi_thieu/update.php';
            break;
        case 'upgt':
            if (isset($_POST['capnhat'])) {
                $id_gioi_thieu = $_POST['id_gioi_thieu'];
                $tieu_de= $_POST['tieu_de'];
                $noi_dung = $_POST['noi_dung'];
                $anh  = $_POST['hinh'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $upload = true;
                $dir = "../uploaded/images/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['hinh']['size'] > 0) {
                    $anh = $imgname;
                }
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    gioi_thieu_update($id_gioi_thieu,$tieu_de,$anh,$noi_dung);
                    $thongbao = "Sửa thành công";
                }
            }
            $list = gioi_thieu_select_all();
            include 'gioi_thieu/list.php';
            break;

          /*------------------------MÀU SẮC---------------------- */
          case 'addms':
            if(isset($_POST['themmoi'])){
                $ten_mau_sac = $_POST['ten_mau_sac'];
                mau_sac_insert($ten_mau_sac);
                $thongbao ="Thêm thành công";
            }
            include 'mausac/add.php';
            break;
        case 'listms':
            $list = mau_sac_select_all();
            include 'mausac/list.php';
            break;
        case 'xoams':
            if(isset($_GET['id_mau_sac'])&& ($_GET['id_mau_sac']>0)){
                $id_mau_sac = $_GET['id_mau_sac'];
                $xoa = mau_sac_delete($id_mau_sac);
                $thongbao ="Xóa thành công";
            } 
            $list = mau_sac_select_all();
            include 'mausac/list.php';
            break;
        case 'suams':
            if(isset($_GET['id_mau_sac'])&& ($_GET['id_mau_sac']>0)){
                $ms= mau_sac_select_by_id($_GET['id_mau_sac']);
                } 
            include 'mausac/update.php';
            break;
        case 'upms':
            if(isset($_POST['capnhat'])){
                $id_mau_sac = $_POST['id_mau_sac'];
                $ten_mau_sac = $_POST['ten_mau_sac'];
                mau_sac_update($id_mau_sac,$ten_mau_sac);
                $thongbao="Sửa thành công";
            }
            $list = mau_sac_select_all();
            include 'mausac/list.php';
            break;
         
        /*------------------------TIN TỨC---------------------- */
        case 'addtt':
            if(isset($_POST['themmoi'])){
                $tieu_de = $_POST['tieu_de'];
                $intro = $_POST['intro'];
                $noi_dung1 = $_POST['noi_dung1'];
                $noi_dung2 = $_POST['noi_dung2'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $upload = true;
                $dir = "../uploaded/tintuc/";
                $target_file = $dir . basename($img['name']);

                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tin_tuc_insert($tieu_de,$intro,$noi_dung1,$imgname,$noi_dung2);
                    // $thongbao = "Thêm thành công";
                }
                if(isset($_FILES['hinhs'])){
                    $file = $_FILES['hinhs'];
                    $file_names = $file['name'];

                    foreach ($file_names as $key => $value) {
                        move_uploaded_file($file['tmp_name'][$key],'../uploaded/tintuc'.$value);
                    }

                }
            }
            include 'tintuc/add.php';
            break;
       
    }
} else {
    include 'home.php';
}
