<?php 
$DB_HOST= "localhost";
$DB_USER = "root";
$DB_PASS ="";
$DB_NAME = "sundarban";

$connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);


if(!$connection){
    die("connection Failed". mysqli_connect_error());
}

$query = "SELECT * FROM sales_data";
$result = mysqli_query($connection,$query); ///Selected table will be fetched 


//Question 1 solution
$categoryRevenue=[];

while($row=mysqli_fetch_assoc($result)){
    $category = $row['CategoryName'];
    $revenue = $row['Revenue'];

    if(!isset($categoryRevenue[$category])){
        $categoryRevenue[$category]=0;
    }

    $categoryRevenue[$category] += $revenue;


}

echo "<h1>1.Revenue Per category: </h1>";
foreach($categoryRevenue as $category => $total){
    echo $category . ":".$total."<br>";
}




mysqli_close($connection);






?>
