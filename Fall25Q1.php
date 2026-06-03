<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href=""
      rel="stylesheet"
    />
    <title>
        Pass Marks
    </title>
  </head>
  <body>
    <form action="" method="POST">
        <h2>CT Marks</h2>
        <label>CT1 :</label>
        <input type="number" name="ct1" id="ct1" required >
        <br><br>

        <label>CT2 :</label>
        <input type="number" name="ct2" required>
        <br><br>

        <label>CT3 :</label>
        <input type="number" name="ct3" required>
        <br><br>

        <label>MID :</label>
        <input type="number" name="mid" required>
        <br><br>

        <label>Final :</label>
        <input type="number" name="final" required>
        <br><br>

        <button type="submit">Calculate Total</button>

    </form>

    <?php
    
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $ct1 = $_POST['ct1'];
            $ct2 = $_POST['ct2'];
            $ct3 = $_POST['ct3'];
            $mid = $_POST['mid'];
            $final = $_POST['final'];
        }

        

        $total_first = $ct1+$ct2+$ct3;
        $min=$ct1;
        if($ct2<$min){
            $min=$ct2;
        }
        if($ct3<$min){
            $min=$ct3;
        }

        $total1 = $total_first-$min;

        //Built in function 
        $total=($ct1+$ct2+$ct3) - min($ct1,$ct2,$ct3);

        echo "Best two ct total: ".$total."<br>";




    
    ?>

  </body>
</html>