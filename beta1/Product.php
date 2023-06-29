<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<html>
<head>
    <!-- <meta http-equiv="refresh" content="5" > -->
   <link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
   <link rel="stylesheet" type="text/css" href="st.css">

	<title> Cart Data </title>
    

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><b>Smartkart</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" <h4 align="left">Hello, <?php echo $_SESSION['name']; ?></h4></a>
          <a class="dropdown-item" href="logout.php">Logout</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Product Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<h1 style="text-align:center;color:white">Products</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, Product, Price FROM contents "; /*select items to display from the sensordata table in the data base*/

echo '<div class="summa" style="margin: 50px;background-color:rgba(80,80,80,0.8);border-radius:12px;"><table class="table" cellspacing="5" cellpadding="5">
      <tr> 
        <th scope="col"><center>id</center></thh>
        <th scope="col"><center>Product</center></thh>   
        <th scope="col"><center>Price</center></th>      
      </tr>
      </div>';

$total_price = 0; 

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_Product = $row["Product"];
        $row_Price = $row["Price"]; 
        $total_price += $row_Price;
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
       // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td>
                <td>' . $row_Product . '</td>  
                <td>' . $row_Price . '</td>
            </tr>';
          
    }
    $result->free();
}


$conn->close();
?> 
</table>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>