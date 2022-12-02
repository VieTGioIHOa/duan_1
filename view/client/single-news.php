<div class="container">
    <?php extract($tin_tuc); 
        extract($images); 
    ?>
    <div class="single-news-wrapper">
        <h1><?= $tieu_de ?></h1>
        <h4> <?= $intro ?></h4>
        <div>
            <img src="./uploaded/tintuc/<?= $anh_chinh ?>" alt="">
        </div>
        <div>
            <p><?=$noi_dung1 ?></p>
            <img src="./uploaded/tintuc/<?= $images[0]['anh'] ?>" alt="">
        </div>
        <div>
            <p><?=$noi_dung2 ?></p>
            <img src="./uploaded/tintuc/<?= $images[1]['anh'] ?>" alt="">
        </div>
    </div>
</div>