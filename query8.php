<html>
<head>
    <title>Query8</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");


$year= $_POST['year'];

$result4 = mysqli_query($con, "SELECT _CUSTOMER.name,SUM(amount) as total_amount FROM _BOOK natural join _ORDER natural join _CUSTOMER
  WHERE YEAR(order_date) >= '$year'
  group by name order by total_amount desc");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>