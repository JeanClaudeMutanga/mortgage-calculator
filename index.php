<?php 
include 'db.php';
$ma ="";
$dp ="";
$mt ="";
$ir = "";
$name =""; 


    //set default value of variables for initial page load
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mortgage Calculator</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.mlcalc.com/widget-api.js"></script>
  </head>

  <body>
  
    <header>
    
     <h2>Mortgage Calculator</h2>
     <ul style=" display: block; list-style-type: none; text-align: left; text-sixe:10px;">
     <li><a href="save.php">View Saved Calculations</a></li>
     </ul>
    </header>
    <main>

    <form class="myForm" action="#" method="post"  >
        <label><div class="tooltip">Purchase Price:
  <span class="tooltiptext">If this is a new loan, this number will be the total amount you are borrowing. If you have already made payments,
  
   look at your current statement, and enter the remaining amount of principle owed after the last payement.</span>
</div><span class="dollar_sign">(ZAR)</span></label>

        <input type="text" name="ma"  placeholder="How much?"  >
        <label><div class="tooltip">Down Payment:
  <span class="tooltiptext">Your interest rate is typically stated as a yearly rate, such as 5.5%.</span>
</div></label>
        <input type="text" class="interest_rate" name="dp"  placeholder="Down Payment(%)" required>
        <label><div class="tooltip">Mortgage Length:
  <span class="tooltiptext">This is the full length of your loan in years or months. If this is an existing loan, subtract the number of payments you have already made from the original number of payments.</span>
</div></label>
        <input type="text" name="mt" placeholder="How long?" required>
        <label><div class="tooltip">Interest Rate :
  <span class="tooltiptext">This is the fixed interest rate for the mortgage.</span>
</div></label>
        <input type="text" name="ir" placeholder="Interest Rate" required>

        <label><div class="tooltip">Calculation Name :
  <span class="tooltiptext">Give this calculation a name so that you can use it to search for the calculation.</span>
</div></label>
        <input type="text" name="name" placeholder="Calculation Name "  required>

       
        <button name="submit" id="submit" >Calculate & Save</button>
      </form>

      <?php

  
  if(isset($_POST['submit'])){
    
    $ma = $_POST['ma'];
    $dp = $_POST['dp'];
    $mt =$_POST['mt'];
    $ir = $_POST['ir'];
    $name =$_POST['name']; 

    $p= $ma;
    $n = $mt *12;
    $n ="-".$n;
    $r = $ir/100/12;
    
    //calculating the bottom part

    $btm = 1+$r;
    $btm = pow($btm,$n);
    $btm = 1-$btm;

    //calculating total fraction

    $final = $r/$btm;

    $c = $final*$p;
    $c = round($c,2);

    //echo "R".$c;

    $tbl = '<table class="tablesorter-blackice" align="center" cellspacing="6">
    <thead>
        <tr>
        
            <th>Calculation Name</th>
            <th>Mortgage Price</th>
            <th>Down Payment</th>
            <th>Interest</th>
            <th>Monthly Payments(ZAR)</th>
            <th>Mortgage Duration</th>
            
            
        </tr>
    </thead><tbody>';

    $tbl .= '<tr >
                    <td>' . $name . '</td>                    
                    <td>' . $p . '</td>
                    <td>' . $dp . '</td>
                    <td>' . $ir . '</td>
                    <td>' . $c . '</td>
                    <td>'  .$mt. ' </td>
                </tr>';

                $tbl .= '</tbody></table>';

                echo $tbl;
                $day =date("Y-m-d H:i:00");
                $query = "INSERT INTO calculations (name,price,down,interest,length,monthly,date)VALUES ('$name','$p','$dp','$ir','$mt','$c','$day')";
                mysqli_query($con,$query);
  } 
  ?>

      <form class="myForm" action="https://www.mlcalc.com/" method="post" onsubmit="return mlcalcCalculate(this)" >
        <label><div class="tooltip">Purchase Price:
  <span class="tooltiptext">If this is a new loan, this number will be the total amount you are borrowing. If you have already made payments,
  
   look at your current statement, and enter the remaining amount of principle owed after the last payement.</span>
</div><span class="dollar_sign">(ZAR)</span></label>

        <input type="text" name="ma"  placeholder="How much?" value="<?php echo  $ma;?>" readonly  >
        <label><div class="tooltip">Down Payment:
  <span class="tooltiptext">Your interest rate is typically stated as a yearly rate, such as 5.5%.</span>
</div></label>
        <input type="text" class="interest_rate" name="dp"  placeholder="Down Payment" value="<?php echo  $dp;?>" readonly>
        <label><div class="tooltip">Mortgage Length:
  <span class="tooltiptext">This is the full length of your loan in years or months. If this is an existing loan, subtract the number of payments you have already made from the original number of payments.</span>
</div></label>
        <input type="text" name="mt" placeholder="How long?" value="<?php echo  $mt;?>" readonly >
        <label><div class="tooltip">Interest Rate :
  <span class="tooltiptext">Give this calculation a nameso that you can use it to search for the calculation.</span>
</div></label>
        <input type="text" name="ir" placeholder="Interest Rate" value="<?php echo  $ir;?>" readonly>

       
        <input type="text" name="pt" placeholder="Property tax" value="0" readonly hidden>

        
        <input type="text" name="pi" placeholder="Property insurance" value="0" readonly hidden>

        <input type="text" name="mi" placeholder="PMI" value="0" readonly hidden>

      
        <input type="text" name="sm" placeholder="First payment date (month)" value="3" readonly hidden>

        
        <input type="text" name="yr" placeholder="First payment date (year)" value="2010" readonly hidden>

    <label>Amortization:
   <label><input type="radio" name="as" value="year" checked="checked"> show by year</label>
   <label><input type="radio" name="as" value="month"> show by month</label>
   <label><input type="radio" name="as" value="none"> don't show</label>
</label><br><br>
        
        <button name="submit" id="submit" >Show Detailed Info</button>
      </form>
      </main>
 </body>
</html>
