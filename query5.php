
<html>
<head>
    <title>Query5</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");

$date= $_POST['date'];


$result4 = mysqli_query($con, "SELECT store_id,order_date,SUM(amount) as total_amount FROM _BOOK natural join _ORDER 
  WHERE order_date = '$date'
  group by store_id,order_date order by total_amount desc limit 1");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>