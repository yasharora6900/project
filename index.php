
<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $sql = "INSERT INTO `project` (`name`, `email`, `phone_number`, `address`, `pincode`) VALUES ('$name', '$email', '$phone_number', '$address', '$pincode')";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PHP  Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="container">
        <h1>Welcome to  PHP  form</h3>
        <p>Enter your details and submit this form. </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
    ?>
      
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
           
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone_number" name="phone_number" id="phone" placeholder="Enter your phone number">
            <input type="address" name="address" id="phone" placeholder="Enter your address">
            <input type="pincode" name="pincode" id="phone" placeholder="Enter your pincode">
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
