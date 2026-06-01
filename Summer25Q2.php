<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href=""
    rel="stylesheet" />
  <title>Movie Night</title>
</head>

<body>
  <form action="" method="POST">


    <h1>Movie Night Event</h1>
    <label>Attendees</label>
    <input type="number" name="attendees" id=""></input>

    <br><br>

    <label>Seat Capacity</label>
    <input type="number" name="" id="seat_capacity"></input>

    <br><br>

    <label>Ticket Price</label>
    <input type="number" name="" id="ticket_price"></input>

    <br><br>
    <input type="submit"></input>




  </form>
  <h1>
  </h1>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $attendees = $_POST['attendees'];
  $seat_capacity = $_POST['seat_capacity'];
  $ticket_price = $_POST['ticket_price'];

  

  
}
?>