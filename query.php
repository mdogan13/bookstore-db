<html>
<head>
    <title>Query</title>
</head>
<body>



<?php


$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");

$author= $_POST['aname'];


$result3 = mysqli_query($con, "SELECT * FROM _BOOK WHERE author_name = '$author'");

echo "<div style=\"position: absolute;top:0;bottom: 0;left: 0;right: 0; margin:auto;\">";
printQueryResult($result3);

echo"</div>";

mysqli_close($con);

function printQueryResult($query){
    echo "<table border='1'>";

    //print table headers
    echo "<tr>";
    for ($i = 0; $i < mysqli_num_fields($query); $i++) {
        $colobj1=mysqli_fetch_field_direct($query,$i );
        echo "<th>" . $colobj1->name . "</th>"; echo "<br>";echo "<br>";echo "<br>";echo "<br>";

    }
    echo "</tr>";


    //print rows

    while($row=mysqli_fetch_array($query)){
        echo "<tr>";

        for ($i = 0; $i < mysqli_num_fields($query); $i++) {

            $colobj=mysqli_fetch_field_direct($query,$i );

            echo "<td>" . $row[$colobj->name]  . "</td>";

        }

        echo "</tr>";
    }

    echo "</table>";
}
?>


</body>
</html>