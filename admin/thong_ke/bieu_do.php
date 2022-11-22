<div id="piechart"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],

  <?php
  $tongdm = count($statistical);
  echo $tongdm;
  
  $i=1;
    foreach ($statistical as $value) {
        extract($value);
        if($i == $tongdm){
            $dau_phay = "";
        }else{
            $dau_phay = ",";
        }
        echo "['".$value['category_name']."', ".$value['so_luong']."]".$dau_phay;
        $i+=1;
    }
  ?>

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Thống kê hàng hóa theo loại', 'width':1000, 'height':1000};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>