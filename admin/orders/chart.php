<?php
include_once '../../common.php';
?>
<?php
//index.php
require('db_connect.php');
$query = "SELECT * FROM tblsummary";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ ORDEREDDATE:'".$row["ORDEREDDATE"]."', PAYMENT:'".$row["PAYMENT"]."', ORDEREDSTATS:'".$row["ORDEREDSTATS"]."'}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title><?php echo $lang['GRAPHS'];?></title>

  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 class="text-center"><?php echo $lang['PAYMENT_DATE_OF_ORDER'];?></h2>
   <h3 class="text-center"><?php echo $lang['DYNAMIC_VALUES_OF_GRAPH'];?></h3>
   <br /><br />
   <div id="chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "index.php" style = "text-decoration: none; color: #333;"><?php echo $lang['BACK_TO_ORDERS'];?></a></button>
</div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'ORDEREDDATE',
 ykeys:['PAYMENT'],
 labels:['PAYMENT', 'ORDEREDDATE'],
 hideHover:'auto',
 stacked:true
});
</script>
