<!-- <h1 class="alert alert-danger">Chào mừng bạn đến với trang Admin</h1> -->
<div class="right">
    <div class="tong">
        <div class="tren">
            <div class="one">
                <h4>Doanh thu</h4>
                <div class="detail">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                        </li>
                        <li>
                            <div class="gia-tri">
                                99999.999 VNĐ
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="one">
                <h4>Số sản phẩm</h4>
                <div class="detail">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                        </li>
                        <li>
                            <div class="gia-tri">
                               <?php foreach ($count_san_pham as $key => $value) {
                                    extract($value);
                                    echo '
                                    '. $dem .' sản phẩm
                                    ';
                               }
                               ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="one">
                <h4>Số tài khoản</h4>
                <div class="detail">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                        </li>
                        <li>
                            <div class="gia-tri">
                                250
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row m-1 pb-5">
            <table class="table table-responsive-md" id="customers">
                <thead class="thead text-center">
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá cao nhất</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="giohang">
                    <?php
                    foreach ($list_thongke as $thongke) {
                        extract($thongke);
                        echo '
                    <tr>
                        <td>' . $maloai . '</td>
                        <td>' . $tenloai . '</td>
                        <td>' . $countsp . '</td>
                        <td>' . $maxgia . ' vnđ</td>
                        <td>' . $mingia . ' vnđ</td>
                        <td>' . $tb . ' vnđ</td>
                    </tr>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="piechart" style="width:100%; height:500px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Số lượng sản phẩm'],
                    <?php
                    foreach ($list_thongke as $thongke) {
                        extract($thongke);
                        echo "
            ['" . $thongke['tenloai'] . "'," . $thongke['countsp'] . "],
        ";
                    }
                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Thống kê sản phẩm theo danh mục'
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
        <div id="myChart" style="width:100%; height:500px;"></div>

        <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Contry', 'Mhl'],
                    ['Italy', 55],
                    ['France', 49],
                    ['Spain', 44],
                    ['USA', 24],
                    ['Argentina', 15]
                ]);

                var options = {
                    title: 'World Wide Wine Production'
                };

                var chart = new google.visualization.BarChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>