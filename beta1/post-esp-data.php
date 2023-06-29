<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $Product = $Quantity = $Price = $flag = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $Product = test_input($_POST["Product"]);
        $Quantity = test_input($_POST["Quantity"]);
        $Price = test_input($_POST["Price"]);
        $flag = test_input($_POST["flag"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        if ($flag == 0){
    
        $sql = "INSERT INTO cartdata (Product, Quantity, Price) VALUES ('" . $Product . "', '" . $Quantity . "', '" . $Price . "');"; 
        $sql .= "SET @row_number = 0;"; 
        $sql .= "UPDATE cartdata SET si_no = (@row_number := @row_number + 1);";
    
        }
        
        else if ($flag == 1 && $Product == 'Milk'){
        
        $sql = "DELETE FROM cartdata WHERE Product  = 'Milk';"; 
        $sql .= "SET @row_number = 0;"; 
        $sql .= "UPDATE cartdata SET si_no = (@row_number := @row_number + 1);";

            
        }
        
        else if ($flag == 1 && $Product == 'Biscuit'){
        
            $sql = "DELETE FROM cartdata WHERE Product  = 'Biscuit';"; 
            $sql .= "SET @row_number = 0;"; 
            $sql .= "UPDATE cartdata SET si_no = (@row_number := @row_number + 1);";

        }

        else if ($flag == 1 && $Product == 'Soap'){
        
            $sql = "DELETE FROM cartdata WHERE Product  = 'Soap';";
            $sql .= "SET @row_number = 0;"; 
            $sql .= "UPDATE cartdata SET si_no = (@row_number := @row_number + 1);";
            
        }

        else if ($flag == 1 && $Product == 'Bread'){
        
            $sql = "DELETE FROM cartdata WHERE Product  = 'Bread';";
            $sql .= "SET @row_number = 0;"; 
            $sql .= "UPDATE cartdata SET si_no = (@row_number := @row_number + 1);";

        }

        else if ($flag == 1 && $Product == 'Chips'){
        
            $sql = "DELETE FROM cartdata WHERE Product  = 'Chips';"; 
            $sql .= "SET @row_number = 0;"; 
            $sql .= "UPDATE cartdata SET si_no = (@row_number := @row_number + 1);";
        }

        if ($conn->multi_query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}