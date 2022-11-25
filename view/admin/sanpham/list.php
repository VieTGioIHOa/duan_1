<div class="right">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách hàng hóa</h4>
        <?php
        if (isset($thongbao)) { ?>
            <p class="alert alert-success"><?= $thongbao ?></p>
        <?php
        }
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">

            <a href="index.php?act=addsp" class="btn btn-success text-white">Thêm mới<i class="fas fa-plus-circle"></i></a>
            <form action="index.php?act=listhh" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Số lượng</th>
                            <th>Đặc biệt?</th>
                            <th>Danh mục</th>
                            <th>Kích cỡ</th>
                            <th>Màu sắc</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listhh as $item) {
                            extract($item);
                            $suahh = "index.php?act=suasp&id_san_pham=" . $id_san_pham;
                            $xoahh = "index.php?act=xoasp&id_san_pham=" . $id_san_pham;
                            $img_path = "../../uploaded/images/" . $anh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='120' width='120' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                            $mau = san_pham_select_mau($id_san_pham);
                            $size = san_pham_select_size($id_san_pham);
                        ?>
                        
                            <tr>
                        
                                <td><?= $ten_san_pham ?></td>
                                <td><?= $img ?></td>
                                <td><?= $gia ?>VNĐ</td>
                                <td><i class="text-danger">(<?= $giam_gia ?>VNĐ)</i></td>
                                <td><?= $so_luong ?></td>
                                <td><?= ($dac_biet == 1) ? "Đặc biệt" : "Không"; ?></td>
                                <td><?= $ten_danh_muc ?></td>
                                <td><?php foreach ($size as $key => $value) { ?>
                                    <?= $value['ten_kich_co'].', '  ?>
                                    <?php } ?>
                                </td>
                                <td><?php foreach ($mau as $key => $value) { ?>
                                    <?= $value['ten_mau_sac'].', '  ?>
                                    <?php } ?>
                                </td>

                               
                                <td class="text-end">
                                    <a href="<?= $suahh ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i>Sửa</a>
                                    <a href="<?= $xoahh ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?');"><i class="fas fa-trash"></i>Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>