<?php
require_once 'pdo.php';

function binh_luan_insert($noi_dung,$ngay_bl,$id_tai_khoan,$id_san_pham){
    $sql = "INSERT INTO binh_luan(noi_dung,ngay_binh_luan,id_tai_khoan,id_san_pham) VALUES (?,?,?,?)";
    pdo_execute($sql, $noi_dung,$ngay_bl,$id_tai_khoan,$id_san_pham);
}

function binh_luan_select_all($id_san_pham){
    $sql = "SELECT * FROM binh_luan where id_san_pham='".$id_san_pham."' ORDER BY ngay_binh_luan DESC";
    $list = pdo_query($sql);
    return $list;
}
function binh_luan_select_alls($id_san_pham){
    $sql = "SELECT b.*,c.*, h.ten_san_pham FROM binh_luan b 
    JOIN san_pham h ON h.id_san_pham=b.id_san_pham
    JOIN tai_khoan c on b.id_tai_khoan = c.id_tai_khoan 
    WHERE h.id_san_pham=? ORDER BY ngay_binh_luan DESC";
    return pdo_query($sql, $id_san_pham);
}