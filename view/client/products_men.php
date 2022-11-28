<?php foreach ($nam as $item) :
    extract($item);
    $img_path = './uploaded/images/' . $anh;
?>
    <div class="item">
        <div class="thumb">
            <div class="hover-content">
                <ul>
                    <div class="col m-2 hidden">
                        <form action="index.php?act=addtocart" method="POST">
                            <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>">
                            <input type="hidden" name="ten_san_pham" value="<?= $ten_san_pham ?>">
                            <input type="hidden" name="anh" value="<?= $anh ?>">
                            <input type="hidden" name="gia" value="<?= $gia ?>">
                            <input type="hidden" name="giam_gia" value="<?= $giam_gia ?>">
                            <input type="submit" name="add" value="Add to cart" class="btn btn-outline-success btn-sm " class="fa fa-shopping-cart">
                        </form>
                    </div>
                    </li>
                </ul>
            </div>
            <a href="index.php?act=chitietsp&id_san_pham=<?php echo $id_san_pham ?>&id_danh_muc=<?= $id_danh_muc ?>">
                <img src="<?= './uploaded/images/' . $anh ?>" alt="" />
            </a>
        </div>
        <div class="down-content">
            <h4><?= $ten_san_pham ?></h4>
            <del style="color:black"><?= $gia ?>VNĐ</del>
            <span style="color:red;font-weight:600;font-size:23px"><?= $giam_gia ?>VNĐ</span>
            <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
        </div>
    </div>
<?php endforeach; ?>