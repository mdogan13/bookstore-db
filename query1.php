<html>
<head>
    <title>Query1</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");

$genre= $_POST['genre'];


$result4 = mysqli_query($con, "SELECT SUM(total_cost),title,store_id FROM _ORDER natural join _BOOK
WHERE genre='$genre' group by title,store_id");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>