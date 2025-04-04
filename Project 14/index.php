<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password =  "";
    
    $con = mysqli_connect($server , $username , $password);
    
    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $desc = $_POST['desc']; 
    $sql = "INSERT INTO `trip`.`trip` ( `name`, `gender`, `number`, `email`, `other`, `dt`) VALUES ( '$name', '$gender', '$number', '$email', '$desc    ', current_timestamp());";
    // echo $sql;
    
    if ($con->query($sql) == true) {
        // echo "Successfully Inserted";
        $insert = true;
    }
    else {
        echo "Error : $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome</h1>
        <p>Enter your details and submit this form to confirm
        <p> your participation in the trip </p>
        </p>
        <?php
        if($insert == true){
            echo "<P class='submitmsg'>Thanks for submitting your form</P>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="phone" name="number" id="number" placeholder="Enter your number">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your any other information">
          </textarea>
          <button class="btn">Sumbit</button>
          <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="script.js"></script>
    
</body>

</html>