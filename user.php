<html>
<head>
    <title>Turn The Page Bookstore</title>
</head>
<body>



<h3>Find books by author.</h3>
<form action="query.php" method="post" >
    Author Name :  <input type="text"  name="aname"> <br><br>

    <input type="submit">
</form>



<h3>Find which stores have a certain book and also show the amount.</h3>
<form action="query2.php" method="post" >
    Book Title :  <input type="text"  name="booktitle"> <br><br>

    <input type="submit">
</form>

<h3>Find the most popular author of all stores (by the total number of books sold).</h3>
<form action="query3.php" method="post" >

    <input type="submit">
</form>

<?php
?>



</body>
</html>
