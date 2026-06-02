<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "sundarban";

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


if (!$connection) {
    die("connection Failed" . mysqli_connect_error());
}

$query = "SELECT * FROM sales_data";
$result = mysqli_query($connection, $query); ///Selected table will be fetched 


//Question 1 solution
$categoryRevenue = [];


while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['CategoryName'];
    $revenue = $row['Revenue'];

    if (!isset($categoryRevenue[$category])) {
        $categoryRevenue[$category] = 0;
    }

    $categoryRevenue[$category] += $revenue;
}

echo "<h1>1.Revenue Per category: </h1>";
foreach ($categoryRevenue as $category => $total) {
    echo $category . ":" . $total . "<br>";
}
//Question 1 end

//Question 2 Starts


//With loop
// while ($row = mysqli_fetch_assoc($result)) {
//     $revenue = $row['Revenue'];
//     if ($revenue < 40000) {
//         $id = $row['SaleID'];
//         mysqli_query($connection, "UPDATE sales_data SET CategoryName = 'Low Performing' WHERE SaleID = $id");
//     }
// }
mysqli_query(
    $connection,
    "UPDATE sales_data
     SET CategoryName = 'Low Performing'
     WHERE Revenue < 40000"
);
echo "<h1>2.Category change based on revenue: </h1>";
foreach ($categoryRevenue as $category => $total) {
    echo $category . ":" . $total . "<br>";
}

//Question 2 ends here 

//Question 3 Starts here 
mysqli_query(
    $connection,
    "UPDATE sales_data
     SET Revenue = Revenue * 1.10
     WHERE Revenue > 70000"
);

//Question 3 ends here 


//Question 4 starts here
echo "<h1>4.</h1>";
$result2 = mysqli_query($connection, $query);

//Counting category
$categoryCount=[];
while ($row = mysqli_fetch_assoc($result2)) {
    $category = $row['CategoryName'];
    $revenue = $row['Revenue'];

    if (!isset($categoryCount[$category])) {
        $categoryCount[$category]=0;
    }

    $categoryCount[$category] ++;
}

$result2 = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result2)){
    $name = $row['ProductName'];
    $category = $row['CategoryName'];


    echo "Name: ".$name.", CategoryName: ".$category.", Label: ";
    $averageRevenue=$categoryRevenue[$category]/$categoryCount[$category];
    
    if($row['Revenue']>$averageRevenue){
        echo "TOP SELLER <br>";
    }
    else{
        echo "Normal seller <br>";
    }

}




mysqli_close($connection);
