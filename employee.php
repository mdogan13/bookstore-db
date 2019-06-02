<html>
<head>
    <title>Turn The Page Bookstore</title>
</head>
<body>


<h3>Find the bestseller in each store for a given genre.</h3>
<form action="query1.php" method="post" >
    Genre :  <input type="text"  name="genre"> <br><br>

    <input type="submit">
</form>

<h3>Find the store that has sold the most books for the given date.</h3>
<form action="query5.php" method="post" >
    Date :  <input type="text"  name="date"> <br><br>

    <input type="submit">
</form>
<h3>Find which customer spent how much money in each store.</h3>
<form action="query6.php" method="post" >

    <input type="submit">
</form>
<h3>Find all customers and order them by the number of books they purchased.</h3>
<form action="query7.php" method="post" >

    <input type="submit">
</form>
<h3>Find all customers who have been purchasing books since given year.</h3>
<form action="query8.php" method="post" >
    Year :  <input type="text"  name="year"> <br><br>
    <input type="submit">
</form>
<h3>Find number of books by their publisher and sort them alphabetically by the name of the publisher for a certain store.</h3>
<form action="query9.php" method="post" >
    Store ID :  <input type="text"  name="storeid"> <br><br>
    <input type="submit">
</form>
<h3>Find the e-mail of all employees that works in a store where bookcopy is available.</h3>
<form action="query10.php" method="post" >
    Book Title :  <input type="text"  name="b_title"> <br><br>
    <input type="submit">
</form>
<?php
?>



</body>
</html>
