 <?php  
    $con = mysqli_connect('localhost','root','','mybank');

    if(!$con)
    {
        die("Could not connect to MySQL due to" . mysqli_connect_error());
    }
    $q="SELECT * FROM `customers`";
    $result = mysqli_query($con,$q); 
?> 

<html>
 <head>
        <title>My Bank</title>
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

.tbl{
    display: flex;
    flex-direction:column;
    align-items:center;
    justify-content:space-between;
}

table.customTable {
    text-align: center;
  width: 60%;
  background-color: #FFF4E6;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #BAC4F8;
  border-style: ridge;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 2px;
  border-color: #BAC4F8;
  border-style: ridge;
  padding: 10px;
}
table.customTable td.serial{
    width: 10%;
}

table.customTable thead {
  background-color: #7EA8F8;
}
.heading{
    position: relative;
    margin:auto;
    text-align:center;
    padding:8px 0px;
    color:white;
    font-family: "Copperplate";
    letter-spacing:1.7px;
    font-size:50px;
}
</style>

<body>

<div class="tbl">

<div>
  <h1 class="heading"><i>Our Customers </i></h1>
</div>

<table class="customTable">
          <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Current Balance</th>
            <th>&nabla;</th>
          </tr>
          <?php
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<form method ='post' action = 'user.php'>";
            echo "<td class='serial'>". $row['sno'] . "</td>
            <td>". $row['name'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['balance'] . "</td>";
            echo "<td> <button type='submit' name='user'  id='users1'  value='{$row['name']}' class='btn-info' >View Customer</button></td>";
            echo "</form>";
           echo  "</tr>";  
        }
        ?>
          
    </table>
  </div>


</body>
</html>
<?php
mysqli_close($con);  
?>