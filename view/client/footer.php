
    <footer>
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                <div class="logo">
                    <img src="view/assets/images/white-logo.png" alt="hexashop ecommerce templatemo" />
                </div>
                <ul>
                            <li><a href="#">6 Trịnh Văn Bô, Xuân Phương, Quận Nam Từ Liêm, Hà Nội.</a></li>
                            <li><a href="#">yodyfpt@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">THỜI TRANG NAM GIỚI</a></li>
                        <li><a href="#">THỜI TRANG NỮ GIỚI</a></li>
                        <li><a href="#">THỜI TRANG TRẺ EM</a></li>
                        <li><a href="#">PHỤ KIỆN THỜI TRANG</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>VỀ YODY</h4>
                    <ul>
                        <li><a href="index.html">Trang Chủ</a></li>
                        <li><a href="about.html">Giới Thiệu</a></li>
                        <li><a href="#">Tin Tức</a></li>
                        <li><a href="contact.html">Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                    <ul>
                        <li><a href="#">Hướng dẫn chọn size</a></li>
                        <li><a href="#">Chính sách khách hàng thân thiết</a></li>
                        <li><a href="#">Thanh toán, giao nhận</a></li>
                        <li><a href="#">Chính sách đổi/trả</a></li>
                        <li><a href="#">Bảo mật thông tin khách hàng</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 YODY FASHION, All Rights Reserved. 
                        
                        <br>Design: <a href="#" target="_parent" title="free css templates">NHÓM 5</a>

                        <br>Distributed By: <a href="#" target="_blank" title="free & premium responsive templates">NHÓM 5</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                </div>
            </div>
            </div>
        </div>
    </footer>
    <script src="view/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="view/assets/js/popper.js"></script>
    <script src="view/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="view/assets/js/owl-carousel.js"></script>
    <script src="view/assets/js/accordions.js"></script>
    <script src="view/assets/js/datepicker.js"></script>
    <script src="view/assets/js/scrollreveal.min.js"></script>
    <script src="view/assets/js/waypoints.min.js"></script>
    <script src="view/assets/js/jquery.counterup.min.js"></script>
    <script src="view/assets/js/imgfix.min.js"></script> 
    <script src="view/assets/js/slick.js"></script> 
    <script src="view/assets/js/lightbox.js"></script> 
    <script src="view/assets/js/isotope.js"></script> 
    <script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>

    <!-- Global Init -->
    <script src="view/assets/js/custom.js"></script>
    <script src="view/assets/maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="view/assets/cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
    </body>
</html>