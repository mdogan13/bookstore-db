<html>
<head>
    <title>Query10</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");

$b_title= $_POST['b_title'];


$result4 = mysqli_query($con, "SELECT distinct email,_EMPLOYEE.store_id FROM
  _EMPLOYEE,_INVENTORY
  WHERE _EMPLOYEE.store_id in 
  (SELECT store_id 
    FROM _BOOKCOPY natural join _INVENTORY natural join _BOOK where title='$b_title')");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>