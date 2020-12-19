<?php
     
     $con = mysqli_connect('localhost','root','','mybank');

    if(!$con)
    {
        die("Could not connect to MySQL due to" . mysqli_connect_error());
    }

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

  </head>

  <style>
  body{
    text-align: center;
    background-color: #43716B; 
}
  </style>
<body>

<?php
$username = $_POST['user'];
$show = "SELECT * FROM `customers` WHERE name='$username' ";
$result = mysqli_query($con,$show);

if(!mysqli_query($con,$show))
echo "error while querying".mysqli_error($con);
     
     $row=mysqli_fetch_array($result);
    
?>
 
 <div class="container container-fluid my-4">
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
  <form method="post" action="transaction.php">
    <h1 class="display-4"><?php echo $row['name']; ?></h1>
    <p class="lead"><?php echo "Email - ".$row['email']. 
                          "<br>Balance -<b>{$row['balance']}</b>";
                    ?>
    </p>
   <?php
   echo " <button type='submit' name='transfer' value='{$row['name']}' class='btn' style='margin:20px 5px 16px 0px;'>Send Money</button> ";
    ?>
    </form>
  </div>
</div>
</div>


</body>
</html>

<?php
mysqli_close($con);  
?>