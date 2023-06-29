<?php 
include 'Amount.php';
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
	background-image: url("nath.jpg");
	background-size: 100% 100%;
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}
        </style>
    <title>Payment Form</title>
</head>
<body>
<script>
function myFunction() {
  alert("You are about to proceed to payment");
}
</script> 
<div class="container p-0 " style="margin-top:0%; ">
<form action="pay.php" method="post">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Name</p>
                        <input class="form-control mb-3" type="text" placeholder="Name" name="customername" value=<?php echo $_SESSION['name']; ?> >
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Email</p>
                        <input class="form-control mb-3" type="text" value=<?php echo $_SESSION['user_name']; ?> name="email">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Contact No</p>
                        <input class="form-control mb-3" type="text" name="contactno" value=<?php

function generateRandomNumber($length = 10) {
    $number = '1234567890';
    $numberLength = strlen($number);
    $randomNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $number[rand(0, $numberLength - 1)];
    }
    return $randomNumber;
}

echo generateRandomNumber();

?> name="contactno">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Amount</p>
                        <input class="form-control mb-3 pt-2 " type="text" name="price" value=<?php echo $total_price; ?> >
                    </div>
                </div>
                <div class="col-12">
                        <input onclick="myFunction()" class="btn btn-primary mb-3" type="submit" name="submit" value="Proceed To Pay">
                </div>
            </div>
        </div>
    </div>  
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>