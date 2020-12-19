<?php
     session_start();
    $con = mysqli_connect('localhost','root','','mybank');
    if(!$con)
    {
        die("Could not connect to MySQL due to" . mysqli_connect_error());
    }
    $sendfrom=$_SESSION["userperson"];
    $receiver=$_POST['receiver'];
    $amount=$_POST['amount'];
    $q1="SELECT `balance` FROM `customers` WHERE name='$sendfrom' ";
    $q2="SELECT `balance` FROM `customers` WHERE name='$receiver' ";
    $result1= mysqli_query($con,$q1);
    $result2 = mysqli_query($con,$q2);
    $b1=mysqli_fetch_array($result1);
    $b2=mysqli_fetch_array($result2);
    if($amount>=0 && $amount<=$b1['balance'])
    {
        $check=true;
        $update1="UPDATE `customers` SET balance=balance-$amount WHERE name='$sendfrom' ";
        $update2="UPDATE `customers` SET balance=balance+$amount WHERE name='$receiver' ";
        $change1=mysqli_query($con,$update1);
        $change2=mysqli_query($con,$update2);
    }
    else
        $check=false;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<style>
body{
    text-align: center;
    background-color: #43716B; 
}
</style>

</head>

<body>

<div class="container container-fluid my-4">
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php if($check)
                                     echo "Transaction Successful !";
                                else
                                     echo "Transaction Unsuccessful...";
                          ?>
    </h1>
    <p class="lead">
    <?php if(!$check)
            echo "<br>Either Transfer Amount exceeds the balance or invalid entry.<br>";
      ?>
    </p>
    <p class="lead">
        <br>
        <a href="customer.php"><button class="btn btn-sm">Customers' Page</button></a>
        <a href="index.php"><button class="btn btn-sm">Back to Home Page</button></a>
    </p>
  </div>
</div>
</div>
</body>
</html>
<?php
mysqli_close($con);  
?>