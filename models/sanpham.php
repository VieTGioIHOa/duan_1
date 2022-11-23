<?php
require_once 'pdo.php';

function san_pham_insert($ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet,$dac_diem,$id_danh_muc, $id_kich_co, $id_mau_sac){
    $sql = "INSERT INTO san_pham(ten_san_pham, anh, mo_ta, gia, giam_gia,so_luong, dac_biet,dac_diem, id_danh_muc, id_kich_co, id_mau_sac) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet == 1,$dac_diem,$id_danh_muc, $id_kich_co, $id_mau_sac);
}

function san_pham_update($id_san_pham,$ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet, $dac_diem, $id_danh_muc, $id_kich_co, $id_mau_sac){
    $sql = "UPDATE san_pham SET ten_san_pham=?,anh=?,mo_ta=?,gia=?,giam_gia=?,so_luong=?,dac_biet=?,dac_diem=?,id_danh_muc=?,id_kich_co=?,id_mau_sac=? WHERE id_san_pham=?";
    pdo_execute($sql, $ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet == 1, $dac_diem, $id_danh_muc, $id_kich_co, $id_mau_sac,$id_san_pham);
}

function san_pham_delete($id_san_pham){
    $sql = "DELETE FROM san_pham WHERE  id_san_pham=?";
    if(is_array($id_san_pham)){
        foreach ($id_san_pham as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_san_pham);
    }
}

function san_pham_select_all(){
    $sql = "SELECT * FROM san_pham ORDER BY id_san_pham desc";
    return pdo_query($sql);
}
function san_pham_cung_loai($ma_loai){
    $sql = "SELECT * FROM san_pham WHERE id_danh_muc = ? ORDER BY RAND() LIMIT 4";
    return pdo_query($sql,$ma_loai);
}
function san_pham_select_by_id($id_san_pham){
    $sql = "SELECT * FROM san_pham WHERE id_san_pham=?";
    return pdo_query_one($sql, $id_san_pham);
}

function san_pham_exist($id_san_pham){
    $sql = "SELECT count(*) FROM san_pham WHERE id_san_pham=?";
    return pdo_query_value($sql, $id_san_pham) > 0;
}


function san_pham_select_dac_biet(){
    $sql = "SELECT * FROM san_pham WHERE dac_biet=1";
    return pdo_query($sql);
}

function san_pham_select_by_danh_muc($id_danh_muc){
    $sql = "SELECT * FROM san_pham WHERE id_danh_muc=?";
    return pdo_query($sql, $id_danh_muc);
}

function san_pham_select_keyword($keyword){
    $sql = "SELECT * FROM san_pham hh "
            . " JOIN danh_muc dm ON dm.id_danh_muc=hh.id_danh_muc "
            . " WHERE ten_san_pham LIKE ? OR ten_danh_muc LIKE ?";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
}

// function san_pham_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM san_pham");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM san_pham ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }
function san_pham_exist_add($ten_san_pham)
{
    $sql = "SELECT count(*) FROM san_pham WHERE ten_san_pham=?";
    return pdo_query_value($sql, $ten_san_pham) > 0;
}
function kich_co_select_all($order ='DESC'){
    $sql = "SELECT * FROM kich_co ORDER BY id_kich_co $order";
    return pdo_query($sql);
}
// function mau_sac_select_all($order ='DESC'){
//     $sql = "SELECT * FROM mau_sac ORDER BY id_mau_sac $order";
//     return pdo_query($sql);
// }
// function mau_sac_select_by_id($id_mau_sac){
//     $sql = "SELECT * FROM mau_sac WHERE id_mau_sac=?";
//     return pdo_query_one($sql, $id_mau_sac);
// }
function san_pham_select_alls(){
    $sql =  $sql = "SELECT s.*,d.ten_danh_muc,m.ten_mau_sac, k.ten_kich_co FROM san_pham s 
    JOIN danh_muc d ON d.id_danh_muc=s.id_danh_muc
    JOIN mau_sac m on m.id_mau_sac = s.id_mau_sac 
    JOIN kich_co k on k.id_kich_co = s.id_kich_co ";
    return pdo_query($sql);
}