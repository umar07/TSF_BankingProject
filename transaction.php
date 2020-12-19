<?php
     session_start();
    $con = mysqli_connect('localhost','root','','mybank');
    if(!$con)
    {
        die("Could not connect to MySQL due to" . mysqli_connect_error());
    }
    $sender=$_POST['transfer'];
    $_SESSION["userperson"]=$sender;
    $q="SELECT `name` FROM `customers`";
    $result = mysqli_query($con,$q);
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
    
    <p class="lead"><?php echo "<h3><span style='font-size: 20px;'>Sender : </span>$sender</h3>"; ?></p>

    <p class="lead">

<form   method="post" action="tran_succesful.php">
<div class="form-group form-inline">
    <label for="exampleFormControlSelect1"> Receiver : &nbsp; </label>
    <select class="form-control" name="receiver" id="exampleFormControlSelect1">
    <option></option>
   <?php
    while($row = mysqli_fetch_array($result)){
            if(strcasecmp($row['name'],$_SESSION["userperson"])==0)
              continue; 
            echo "<option>{$row['name']}</option>";
    }
    ?>
    </select>
  </div>
  <div class="form-group form-inline">
    <label for="exampleFormControlInput1">Amount : &nbsp; </label>
    <input type="text" size="5" name="amount" class="form-control" id="exampleFormControlInput1" >
  </div>
 
  <input class="btn" type="submit" value="Transfer Now" style="margin:20px 5px 16px 0px;"></input>
  </form>

    

  </div>
</div>
</div>


</body>
</html>

<?php
mysqli_close($con);  
?>