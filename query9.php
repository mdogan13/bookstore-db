<html>
<head>
    <title>Query8</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");


$storeid= $_POST['storeid'];

$result4 = mysqli_query($con, "SELECT publisher_name,COUNT(ISBN) as total_amount FROM _BOOK natural join _BOOKCOPY
  WHERE book_id in (SELECT book_id FROM _INVENTORY, _STORE 
    WHERE _INVENTORY.store_id = '$storeid') group by publisher_name order by publisher_name asc");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>