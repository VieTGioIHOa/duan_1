<div class="right">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách hàng hóa</h4>
        <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">

        <a href="index.php?act=addsp"><input type="submit" class="btn btn-success mb-1" value="Nhập thêm"></a>
            <form action="index.php?act=listhh" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã SP</th>
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
                            $img_path = "../uploaded/images/". $anh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                        ?>
                        <tr>
                            <td><?= $id_san_pham ?></td>
                            <td><?= $ten_san_pham ?></td>
                            <td><?= $img ?></td>
                            <td><?= $gia ?>VNĐ</td>
                            <td><i class="text-danger">(<?= $giam_gia?>VNĐ)</i></td>
                            <td><?= $so_luong ?></td>
                            <td><?= ($dac_biet == 1) ? "Đặc biệt" : "Không"; ?></td>
                            <td><?= $ten_danh_muc ?></td>
                            <td><?= $ten_kich_co ?></td>
                            <td><?= $ten_mau_sac ?></td>
                            <td class="text-end">
                                <a href="<?= $suahh ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i>Sửa</a>
                                <a href="<?= $xoahh ?>" class="btn btn-outline-danger btn-rounded"
                                onclick="return confirm('Bạn thật sự muốn xóa?');"><i class="fas fa-trash"></i>Xóa</a>
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