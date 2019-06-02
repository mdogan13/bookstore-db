<html>
<head>
    <title>Query2</title>
</head>
<body>



<?php
include 'query.php';

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");

$booktitle= $_POST['booktitle'];


$result4 = mysqli_query($con, "SELECT title,ISBN,store_id,COUNT(ISBN) 
  FROM _BOOKCOPY natural join _INVENTORY natural join _BOOK where title='$booktitle'
  group by store_id,ISBN");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result4);

echo"</div>";

mysqli_close($con);


?>


</body>
</html>