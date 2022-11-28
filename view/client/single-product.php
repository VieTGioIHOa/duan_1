  <?php extract($san_pham); ?>
  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-content">
              <h2>Single Product Page</h2>
              <!-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="left-images">
              <div class="row">
                <div class="col-lg-3">
                  <?php foreach ($anh_san_pham as $item) :?>
                    <div class="col-lg-12"><img src="./uploaded/images/<?=$item['anh']?>" /></div>
                  <?php endforeach;?>
                </div>
                <div class="col-lg-9">
                  <img src="./uploaded/images/<?= $anh ?>" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="right-content">
              <h4><?= $ten_san_pham?></h4>
              <div class="price">
                <del class="text-black"><?= $gia?>đ</del>
                <div class="text-danger"><?= $giam_gia?>đ</div>
              </div>
              <!-- <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul> -->
              <span
                ><?= $dac_diem?></span
              >
              <div class="quote">
                <i class="fa fa-quote-left"></i>
                <p>
                  <?= $mo_ta?>
                </p>
              </div>
              <div class="order-content">
                <div class="left-content">
                  <h6>Quantity</h6>
                  <h6>Size</h6>
                  <h6>Color</h6>
                </div>
                <div class="right-content">
                  <form action="index.php?act=add_to_cart" method="POST">
                    <input type="number" min="1" max="" name="so_luong" class="input qty">
                    <input type="hidden" name="ten" value="<?= $ten_san_pham ?>" >
                    <input type="hidden" name="gia" value="<?= $gia ?>" >
                    <input type="hidden" name="anh" value="<?= $anh ?>" >
                    <div class="size">
                      <?php foreach ($size_san_pham as $item) :?>
                        <div >
                            <span class="name"><?=$item['ten_kich_co'] ?></span>
                            <input type="radio" name="size" value="<?=$item['ten_kich_co'] ?>">
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="color">
                      <?php foreach ($mau_san_pham as $item) :?>
                        <div>
                            <span class="name"><?=$item['ten_mau_sac'] ?></span>
                            <input type="radio" name="mau" value="<?=$item['ten_mau_sac']?>">
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <input type="submit" name="add_to_cart"class="btn-add-to-cart" value="Add To Cart">
                  </form>
                </div>
              </div>
              <!-- <div class="total">
                <h4>Total: $210.00</h4>
                
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/quantity.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>

    <script>
      $(function () {
        var selectedClass = "";
        $("p").click(function () {
          selectedClass = $(this).attr("data-rel");
          $("#portfolio").fadeTo(50, 0.1);
          $("#portfolio div")
            .not("." + selectedClass)
            .fadeOut();
          setTimeout(function () {
            $("." + selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
          }, 500);
        });
      });
    </script>
  </body>
