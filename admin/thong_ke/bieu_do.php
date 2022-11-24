<div id="piechart" style="margin-top: 16px;"></div>


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
      ['Danh mục', 'Số lượng truyện'],
      <?php
        $tongdm = count($statistical);
        $i = 1;
        foreach ($statistical as $value) {
          extract($value);
          if ($i == $tongdm) {
            $dau_phay = "";
          } else {
            $dau_phay = ",";
          }
          echo "['" . $value['category_name'] . "', " . $value['so_luong'] . "]" . $dau_phay;
          $i += 1;
        }
      ?>
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
      'title': 'Thống kê truyện theo loại',
      'width': 1050,
      'height': 500
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>