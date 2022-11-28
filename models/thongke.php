<?php
require_once 'pdo.php';

function load_all_thongke(){
    $sql = "select danh_muc.id_danh_muc as maloai, danh_muc.ten_danh_muc as tenloai, count(san_pham.id_san_pham) as countsp, min(san_pham.gia) as mingia, max(san_pham.gia) as maxgia, avg(san_pham.gia) as tb
    from san_pham inner join danh_muc on danh_muc.id_danh_muc = san_pham.id_danh_muc group by danh_muc.id_danh_muc order by danh_muc.id_danh_muc desc";
    $list_thongke = pdo_query($sql);
    return $list_thongke;
}
function count_san_pham(){
    $sql = "SELECT COUNT(ten_san_pham) as dem from san_pham";
    return pdo_query($sql);
}