<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
$server = "localhost";
$username = "root";
$password = "";

// created a database connection 
$con = mysqli_connect($server, $username, $password);

// check for connection success 
if(!$con){
    die("Connection to this Database Faild due to " .mysqli_connect_error());
}
// echo "Succesfully connected to the database";

// collect  POST variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `form`.`form` (`name`, `age`, `gender`, `email`, `phone`,
`desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email',
'$phone', '$desc', current_timestamp());";
// echo $sql;

// executed the query 
if($con->query($sql) == true){
    // echo "succsesfully inserted";

    // Flag for successfull insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// closed the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration form</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap"
      rel="stylesheet"
    />
  </head>
  <link rel="stylesheet" href="style.css" />
  <body>
    <img class="bg" src="bg.webp" alt="Mobile reparing" />
    <div class="container">
      <h1>Welcome to Software Solutions To repair Your Mobile</h1>
      <p>
        Enter your issue and submmit this form to repair your mobile immidiatly
      </p>
      <?php
      if($insert == true){
      echo "<p class='submitMsg'>
        Thank you for submmiting the form we are resolving your queary very soon
        🙂
      </p>";
      }
      ?>
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter Your Name"
        />
        <input type="text" name="age" id="age" placeholder="Enter Your Age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter Your Gender"
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter Your Email"
        />
        <input
          type="phone"
          name="phone"
          id="phone"
          placeholder="Enter Your Phone"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Discribe Your Issue Here"
        ></textarea>
        <button class="btn">Submit</button>
        <!-- <button class="btn">Reset</button> -->
      </form>
    </div>
    <!-- https://youtu.be/1SnPKhCdlsU?t=7499 -->

    <!-- INSERT INTO `form` (`sno`, `name`, `age`, `gender`, `email`, `phone`,
    `desc`, `dt`) VALUES ('1', 'testname', '18', 'male', 'test2gmail.com',
    '1234567890', 'test desc', current_timestamp()); -->

    <!-- INSERT INTO `form` (`sno`, `name`, `age`, `gender`, `email`, `phone`,
    `desc`, `dt`) VALUES ('1', 'testname', '18', 'male', 'test2gmail.com',
    '1234567890', 'test desc', current_timestamp()); -->
  </body>
</html>