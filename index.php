<html>
<head>
    <title>Turn The Page Bookstore</title>
</head>
<body>

<a href="user.php">Customer Page</a> <br><br>
<a href="employee.php">Employee Page</a><br><br>






<?php

$con =mysqli_connect("istavrit.eng.ku.edu.tr","mdogan13","9jFlBAUviNm72MAL","mdogan13_db");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
    echo "<br>";
}


createTables($con);
populateDB($con);




mysqli_close($con);


function createTables($con){
    $query="CREATE TABLE _WRITER (author_name VARCHAR (90), dob DATE ,PRIMARY KEY(author_name))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _PUBLISHER (publisher_name VARCHAR (90), address VARCHAR(50),foundation_year YEAR,PRIMARY KEY(publisher_name))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _BOOK (ISBN NUMERIC(13), title VARCHAR (100), author_name VARCHAR (90),publisher_name VARCHAR (90),genre VARCHAR (20),price NUMERIC (3), PRIMARY KEY(ISBN), FOREIGN  KEY  (author_name) REFERENCES _WRITER(author_name),FOREIGN  KEY  (publisher_name) REFERENCES _PUBLISHER(publisher_name))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _CUSTOMER (customer_id NUMERIC(5), name VARCHAR(90),email VARCHAR(90),PRIMARY KEY(customer_id))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _COMPANY (company_id NUMERIC(5), name VARCHAR(90),PRIMARY KEY(company_id))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _STORE (store_id NUMERIC(5), company_id NUMERIC(5), location VARCHAR(90), PRIMARY KEY(store_id),FOREIGN  KEY  (company_id) REFERENCES _COMPANY(company_id))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _EMPLOYEE (employee_id NUMERIC(5), store_id NUMERIC(5),name VARCHAR(90),email VARCHAR(90),PRIMARY KEY(employee_id),FOREIGN  KEY  (store_id) REFERENCES _STORE(store_id))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _BOOKCOPY (book_id NUMERIC(5),ISBN NUMERIC(13) ,PRIMARY KEY(book_id),FOREIGN  KEY  (ISBN) REFERENCES _BOOK(ISBN))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _INVENTORY (book_id NUMERIC(5), store_id NUMERIC(5),PRIMARY KEY(book_id),FOREIGN  KEY  (book_id) REFERENCES _BOOKCOPY(book_id),FOREIGN  KEY  (store_id) REFERENCES _STORE(store_id))";
    mysqli_query($con, $query);

    $query="CREATE TABLE _ORDER (order_id NUMERIC(5),customer_id NUMERIC(5),ISBN NUMERIC(13),store_id NUMERIC(5),amount NUMERIC(2),total_cost NUMERIC (4),order_date DATE,PRIMARY KEY(order_id),FOREIGN  KEY  (customer_id) REFERENCES _CUSTOMER(customer_id),FOREIGN  KEY  (ISBN) REFERENCES _BOOK(ISBN),FOREIGN  KEY  (store_id) REFERENCES _STORE(store_id))";
    mysqli_query($con, $query);

}

function populateDB($con){

    ///////////////////////
    populateWriter($con);
    populatePublisher($con);
    populateBook($con);
    //////////////////////
    populateCustomer($con);
    populateCompany($con);
    populateStore($con);
    populateEmployee($con);
    populateBookCopy($con);
    populateInventory($con);
    populateOrder($con);


}

function populateOrder($con){

    //Customer_id with 10100
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('1','10100','1234567891214','30200','1','26',STR_TO_DATE('12-01-2013', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('2','10100','1234567891213','30400','1','23',STR_TO_DATE('12-01-2013', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10101
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('3','10101','1234567891215','30500','1','18',STR_TO_DATE('18-02-2014', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('4','10101','1234567891217','30300','1','19',STR_TO_DATE('03-02-2015', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('5','10101','1234567891213','30500','1','23',STR_TO_DATE('03-02-2015', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10102
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('6','10102','1234567891219','30300','1','18',STR_TO_DATE('24-05-2015', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('7','10102','1234567891238','30100','1','27',STR_TO_DATE('01-01-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('8','10102','1234567891222','30400','1','19',STR_TO_DATE('19-05-2015', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('9','10102','1234567891221','30400','1','25',STR_TO_DATE('19-05-2016', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10103
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('10','10103','1234567891236','30300','1','13',STR_TO_DATE('24-09-2015', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10104
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('11','10104','1234567891238','30300','1','27',STR_TO_DATE('08-12-2014', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10105
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('12','10105','1234567891214','30400','1','26',STR_TO_DATE('02-01-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10106
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('13','10106','1234567891233','30200','10','150',STR_TO_DATE('02-08-2016', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('14','10106','1233567891233','30500','24','370',STR_TO_DATE('02-08-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('15','10106','1234567891235','30100','18','306',STR_TO_DATE('02-01-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10107
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('16','10107','1234567891211','30300','1','7',STR_TO_DATE('05-05-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10108
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('17','10108','3299567891222','30400','1','28',STR_TO_DATE('30-03-2018', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10109
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('18','10109','2299567891222','30400','1','27',STR_TO_DATE('28-08-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

    //Customer_id with 10110
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('20','10110','1299567891222','30100','1','32',STR_TO_DATE('04-02-2018', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _ORDER(order_id,customer_id,ISBN,store_id,amount,total_cost,order_date) VALUES('19','10110','1234567891232','30500','1','150',STR_TO_DATE('14-02-2017', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

}

function populateInventory($con){
    //goes book by book
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50010','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50020','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50030','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50040','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50050','30400')";
    mysqli_query($con, $sql);
    //book2
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50060','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50070','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50080','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50090','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50100','30200')";
    mysqli_query($con, $sql);
    //book3
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50110','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50120','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50130','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50140','30500')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50150','30500')";
    mysqli_query($con, $sql);
    //book4
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50160','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50170','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50180','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50190','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50200','30500')";
    mysqli_query($con, $sql);
    //book5
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50210','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50220','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50230','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50240','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50250','30500')";
    mysqli_query($con, $sql);
    //book6
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50260','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50270','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50280','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50290','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50300','30300')";
    mysqli_query($con, $sql);
    //book7
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50310','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50320','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50330','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50340','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50350','30500')";
    mysqli_query($con, $sql);
    //book8
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50360','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50370','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50380','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50390','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50400','30500')";
    mysqli_query($con, $sql);
    //book9
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50410','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50420','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50430','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50440','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50450','30500')";
    mysqli_query($con, $sql);
    //book10
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50460','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50470','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50480','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50490','30500')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50500','30500')";
    mysqli_query($con, $sql);
    //book11
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50510','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50520','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50530','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50540','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50550','30500')";
    mysqli_query($con, $sql);
    //book12
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50560','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50570','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50580','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50590','30500')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50600','30500')";
    mysqli_query($con, $sql);
    //book13
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50610','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50620','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50630','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50640','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50650','30500')";
    mysqli_query($con, $sql);
    //book14
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50660','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50670','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50680','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50690','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50700','30500')";
    mysqli_query($con, $sql);
    //book15
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50710','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50720','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50730','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50740','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50750','30500')";
    mysqli_query($con, $sql);
    //book16
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50760','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50770','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50780','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50790','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50800','30500')";
    mysqli_query($con, $sql);
    //book17
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50810','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50820','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50830','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50840','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50850','30500')";
    mysqli_query($con, $sql);
    //book18
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50860','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50870','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50880','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50890','30500')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50900','30500')";
    mysqli_query($con, $sql);
    //book19
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50910','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50920','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50930','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50940','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50950','30500')";
    mysqli_query($con, $sql);
    //book20
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50960','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50970','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50980','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('50990','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51000','30500')";
    mysqli_query($con, $sql);
    //book21
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51010','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51020','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51030','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51040','30500')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51050','30500')";
    mysqli_query($con, $sql);
    //book22
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51060','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51070','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51080','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51090','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51100','30500')";
    mysqli_query($con, $sql);
    //book23
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51110','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51120','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51130','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51140','30500')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51150','30500')";
    mysqli_query($con, $sql);
    //book24
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51160','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51170','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51180','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51190','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51200','30500')";
    mysqli_query($con, $sql);
    //book25
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51210','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51220','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51230','30200')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51240','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51250','30500')";
    mysqli_query($con, $sql);
    //book26
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51260','30100')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51270','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51280','30300')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51290','30400')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _INVENTORY(book_id,store_id) VALUES('51300','30400')";
    mysqli_query($con, $sql);



}

function populateBookCopy($con){
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50010','1234567891234')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50020','1234567891234')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50030','1234567891234')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50040','1234567891234')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50050','1234567891234')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50060','1234567891231')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50070','1234567891231')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50080','1234567891231')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50090','1234567891231')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50100','1234567891231')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50110','1234567891232')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50120','1234567891232')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50130','1234567891232')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50140','1234567891232')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50150','1234567891232')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50160','1234567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50170','1234567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50180','1234567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50190','1234567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50200','1234567891233')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50210','1233567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50220','1233567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50230','1233567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50240','1233567891233')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50250','1233567891233')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50260','1234567891235')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50270','1234567891235')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50280','1234567891235')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50290','1234567891235')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50300','1234567891235')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50310','1234567891236')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50320','1234567891236')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50330','1234567891236')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50340','1234567891236')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50350','1234567891236')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50360','1234567891237')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50370','1234567891237')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50380','1234567891237')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50390','1234567891237')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50400','1234567891237')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50410','1234567891238')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50420','1234567891238')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50430','1234567891238')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50440','1234567891238')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50450','1234567891238')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50460','1234567891239')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50470','1234567891239')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50480','1234567891239')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50490','1234567891239')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50500','1234567891239')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50510','1234567891230')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50520','1234567891230')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50530','1234567891230')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50540','1234567891230')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50550','1234567891230')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50560','1234567891211')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50570','1234567891211')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50580','1234567891211')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50590','1234567891211')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50600','1234567891211')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50610','1234567891212')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50620','1234567891212')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50630','1234567891212')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50640','1234567891212')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50650','1234567891212')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50660','1234567891213')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50670','1234567891213')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50680','1234567891213')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50690','1234567891213')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50700','1234567891213')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50710','1234567891214')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50720','1234567891214')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50730','1234567891214')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50740','1234567891214')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50750','1234567891214')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50760','1234567891215')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50770','1234567891215')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50780','1234567891215')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50790','1234567891215')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50800','1234567891215')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50810','1234567891216')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50820','1234567891216')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50830','1234567891216')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50840','1234567891216')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50850','1234567891216')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50860','1234567891217')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50870','1234567891217')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50880','1234567891217')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50890','1234567891217')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50900','1234567891217')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50910','1234567891218')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50920','1234567891218')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50930','1234567891218')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50940','1234567891218')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50950','1234567891218')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50960','1234567891219')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50970','1234567891219')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50980','1234567891219')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('50990','1234567891219')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51000','1234567891219')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51010','1234567891220')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51020','1234567891220')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51030','1234567891220')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51040','1234567891220')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51050','1234567891220')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51060','1234567891221')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51070','1234567891221')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51080','1234567891221')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51090','1234567891221')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51100','1234567891221')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51110','1234567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51120','1234567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51130','1234567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51140','1234567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51150','1234567891222')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51160','1299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51170','1299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51180','1299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51190','1299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51200','1299567891222')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51210','2299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51220','2299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51230','2299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51240','2299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51250','2299567891222')";
    mysqli_query($con, $sql);
    //
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51260','3299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51270','3299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51280','3299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51290','3299567891222')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOKCOPY(book_id, ISBN) VALUES('51300','3299567891222')";
    mysqli_query($con, $sql);

}

function populateCompany($con){
    $sql= "INSERT INTO _COMPANY(company_id, name) VALUES('20000','Turn The Page Bookstore')";
    mysqli_query($con, $sql);
}

function populateEmployee($con){
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40100','30100','Shawn Perkins','sperkins@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40101','30100','Amaya Roberson','aroberson@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40102','30100','Kymani Gentry','kgentry@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40103','30200','Santino Gilber','sgilber@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40104','30200','Demarcus Faulkner','dfaulkner@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40105','30200','Kailyn Owens','kowens@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40106','30300','Ansley Hudson','ahudson@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40107','30300','Jaylen Berry','jberry@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40108','30300','Katherine Costa','kcosta@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40109','30400','Rowan Cook','rcook@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40110','30400','Natalya Mills','nmills@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40111','30400','Kenyon Stein','kstein@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40112','30500','Nathalie Watkins','nwatkins@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40113','30500','Bryan Petersen','bpeterson@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _EMPLOYEE(employee_id, store_id, name, email) VALUES('40114','30500','Madelyn Collier','mcollier@gmail.com')";
    mysqli_query($con, $sql);
}

function populateStore($con){
    $sql= "INSERT INTO _STORE(store_id, company_id, location) VALUES('30100','20000','4 Cross Lane')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _STORE(store_id, company_id, location) VALUES('30200','20000','86 Chapel St.')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _STORE(store_id, company_id, location) VALUES('30300','20000','62 Yukon Street')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _STORE(store_id, company_id, location) VALUES('30400','20000','771 James St.')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _STORE(store_id, company_id, location) VALUES('30500','20000','452 Holly Lane')";
    mysqli_query($con, $sql);
}

function populateCustomer($con){
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10100','Waylon Dalton','wdalton@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10101','Justine Henderson','jhenderson@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10102','Marcus Cruz','mcruz@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10103','Thalia Cobb','tcobb@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10104','Mathias Little','mlittle@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10105','Eddie Randolph','erandolph@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10106','Angela Walker','awalker@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10107','Kate Fowler','kfowler@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10108','Elias Singleton','esingleton@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10109','Terrence Reyes','treyes@gmail.com')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _CUSTOMER(customer_id, name, email) VALUES('10110','Martin Hobbs','mhobbs@gmail.com')";
    mysqli_query($con, $sql);
}

function populateWriter($con){
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Jack London',STR_TO_DATE('12-01-1876', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Miguel De Cervantes',STR_TO_DATE('29-12-1547', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('John Bunyan',STR_TO_DATE('28-11-1628', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Daniel Dafoe',STR_TO_DATE('13-09-1660', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Henry Fielding',STR_TO_DATE('22-05-1707', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Samuel Richardson',STR_TO_DATE('19-09-1689', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Laurence Sterne',STR_TO_DATE('24-11-1713', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Pierre Choderlos De Laclos',STR_TO_DATE('18-10-1741', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Jane Austen',STR_TO_DATE('16-12-1775', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Mary Shelley',STR_TO_DATE('30-08-1797', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Thomas Love Peacock',STR_TO_DATE('18-10-1785', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Honoré De Balzac',STR_TO_DATE('20-05-1799', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Alexandre Dumas',STR_TO_DATE('24-07-1802', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Charlotte Brontë',STR_TO_DATE('21-05-1816', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Herman Melville',STR_TO_DATE('01-08-1819', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Gustave Flaubert',STR_TO_DATE('12-12-1821', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Wilkie Collins',STR_TO_DATE('08-01-1824', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Louisa M. Alcott',STR_TO_DATE('29-11-1832', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Fyodor Dostoevsky',STR_TO_DATE('11-11-1821', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Mark Twain',STR_TO_DATE('30-11-1835', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('James Joyce',STR_TO_DATE('02-02-1882', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('Virginia Woolf',STR_TO_DATE('25-01-1882', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('F. Scott Fitzgerald',STR_TO_DATE('24-09-1896', '%d-%m-%Y'))";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _WRITER(author_name,dob) VALUES('J. R. R. Tolkien',STR_TO_DATE('03-01-1892', '%d-%m-%Y'))";
    mysqli_query($con, $sql);

}

function populatePublisher($con){
    $sql= "INSERT INTO _PUBLISHER(publisher_name,address,foundation_year) VALUES('Akashic Books','30 Park Avenue St.','1943')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _PUBLISHER(publisher_name,address,foundation_year) VALUES('Graywolf Press','21 Broadway St.','1978')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _PUBLISHER(publisher_name,address,foundation_year) VALUES('Phaidon','221B Baker St.','1976')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _PUBLISHER(publisher_name,address,foundation_year) VALUES('Tin House','4 Bagdat St.','1953')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _PUBLISHER(publisher_name,address,foundation_year) VALUES('Dzanc Books','34 Istiklal St.','2002')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _PUBLISHER(publisher_name,address,foundation_year) VALUES('Penguin Books','42 Baltic Avenue St.','2002')";
    mysqli_query($con, $sql);
}

function populateBook($con){
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891234','Call of the Wild','Jack London','Graywolf Press','Action and Adventure','10')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title,author_name,publisher_name,genre,price) VALUES('1234567891231','Don Quixote','Miguel De Cervantes', 'Penguin Books','Anthology','12')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891232','Pilgrims Progress','John Bunyan','Phaidon','Anthology','8')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891233','Robinson Crusoe','Daniel Dafoe','Tin House','Horror','15')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1233567891233','Tom Jones','Henry Fielding','Penguin Books','Horror','20')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891235','Clarissa ','Samuel Richardson','Tin House','Horror','17')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891236','Tristram Shandy','Laurence Sterne','Graywolf Press','Horror','13')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891237','Dangerous Liaisons','Pierre Choderlos De Laclos','Graywolf Press','Horror','22')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891238','Emma','Jane Austen','Phaidon','Mystery','27')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891239','Frankenstein','Mary Shelley','Penguin Books','Mystery','14')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891230','Nightmare Abbey','Thomas Love Peacock','Tin House','Mystery','11')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891211','The Black Sheep','Honoré De Balzac','Dzanc Books','Mystery','7')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891212','The Count of Monte Cristo ','Alexandre Dumas','Tin House','Mystery','15')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891213','Jane Eyre','Charlotte Brontë','Graywolf Press','Romance','23')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891214','Moby-Dick','Herman Melville','Phaidon','Romance','26')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891215','Madame Bovary','Gustave Flaubert','Phaidon','Romance','18')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891216','The Woman in White','Wilkie Collins','Penguin Books','Romance','11')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891217','Little Women','Louisa M. Alcott','Graywolf Press','Romance','19')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891218','The Brothers Karamazov','Fyodor Dostoevsky','Dzanc Books','Action and Adventure','28')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891219','Huckleberry Finn','Mark Twain','Phaidon','Action and Adventure','21')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891220','Ulysses','James Joyce','Penguin Books','Action and Adventure','12')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891221','Mrs Dalloway','Virginia Woolf','Graywolf Press','Action and Adventure','25')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1234567891222','The Great Gatsby','F. Scott Fitzgerald','Tin House','Action and Adventure','19')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('1299567891222','The Lord of the Rings: The Fellowship of the Ring','J. R. R. Tolkien', 'Akashic Books','Fantasy','32')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('2299567891222','The Lord of the Rings: The Two Towers','J. R. R. Tolkien','Akashic Books','Fantasy','27')";
    mysqli_query($con, $sql);
    $sql= "INSERT INTO _BOOK(ISBN, title, author_name,publisher_name,genre,price) VALUES('3299567891222','The Lord of the Rings: The Return of the King','J. R. R. Tolkien','Akashic Books','Fantasy','28')";
    mysqli_query($con, $sql);
}

?>



</body>
</html>


