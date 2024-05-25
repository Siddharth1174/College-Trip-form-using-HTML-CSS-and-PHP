<?php
$insert = false;
if(isset($_POST['name'])){   
    //Set connection variables
    $server = 'localhost';
    $username = 'root';
    $password = "";

    //create a database connection
    $con = mysqli_connect($server, $username, $password);
    
    //check for connection success
    if(!$con){   //if $con returns false
        die("connection to this database failed due to".mysqli_connect_error());
    }
    //echo "Success connecting to the db";

    //collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc']; 
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    //execute the query
    if($con->query($sql)==true){
        // echo "Successfully inserted";

        //flag for successful insertion
        $insert = true; 
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //close database connection
    $con->close();
}    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="utah.jpg" alt="College">
    <div class="container">
        <h1>Welcome to College trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert==true){  
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the trip</p>";
        }
        ?>
        <form action="index.php" method = "post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '23', 'male', 'this@this.com', '9999999999', 'This is y first ever php myadmin message.', current_timestamp()); -->
</body>
</html>