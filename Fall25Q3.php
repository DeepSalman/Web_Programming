<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'campus_library';


$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$connection) {
    die("Connection Failed" . mysqli_connect_errno());
}

//Question 01
$sql1 = "SELECT Status, COUNT(*) AS BookCount
         FROM book_loans
         GROUP BY Status
         HAVING COUNT(*) > 1";

$result1 = mysqli_query($connection, $sql1);

echo "<h1>Campus Library - Book Loans</h1>";
echo "<h1>Solve01:</h1>";

while ($row = mysqli_fetch_assoc($result1)) {

    echo $row['Status'] . ":" . $row['BookCount'] . "<br>";
}

//question 02
$sq2 = "UPDATE book_loans
        SET Status = 'Grace Period',
            PenaltyFee = 0
        WHERE Status = 'Overdue'
          AND DaysOverdue < 7";

mysqli_query($connection, $sq2);



//Question 03
$sq3 = "UPDATE book_loans
        SET PenaltyFee = PenaltyFee * 1.10
        WHERE PenaltyFee > 20
        AND PenaltyFee * 1.10 <= 50";


mysqli_query($connection, $sq3);

$sq4 = "SELECT BookTitle, SUM(PenaltyFee) AS TotalPenalty";
mysqli_query($connection,$sq4);




?>