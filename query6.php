<html>
<head>
    <title>Query6</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");




$result4 = mysqli_query($con, "SELECT _CUSTOMER.name,store_id,SUM(total_cost) as total_cost FROM _BOOK natural join _ORDER natural join _CUSTOMER
  group by store_id,name order by total_cost,store_id desc");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>