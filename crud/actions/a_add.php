<?php
ob_start();
session_start();
require_once 'dbconnect.php';


if( !isset($_SESSION['admin' ]) && !isset($_SESSION['customer']) ) {
    header("Location: login.php");
    exit;
   }
   
   if(isset($_SESSION["customer"])){
       header("Location: home.php");
       exit;
     }
// select logged-in users details
$res=mysqli_query($con, "SELECT * FROM users WHERE userID=".$_SESSION['admin']);




?>

<!DOCTYPE html>
<html>

<head>

    <title>New entry added</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <style>
        #jambo {
            background-image: url("https://cdn.pixabay.com/photo/2017/05/16/21/24/gorilla-2318998_960_720.jpg");
            background-repeat: no-repeat;
            background-size: cover;
           
        }

    </style>

</head>





<body>

    <div class="jumbotron" id="jambo">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>


    <div class="container">
        <?php require_once 'dbconnect.php';

            if($_POST) {
                $animalName = $_POST['animalName'];
                $animalAge = $_POST['animalAge'];
                $animalType = $_POST['animalType'];
                $Breed = $_POST['Breed'];
                $description = $_POST['description'];
                $image= $_POST['image'];
                $hobbies = $_POST['hobbies'];
                $adopted = $_POST['adopted'];

                $name= $_POST['name'];
                $address = $_POST['address'];
                $zipCode = $_POST['zipCode'];
                $city= $_POST['city'];
                
                // $adoptionDate = $_POST['adoptionDate'];


                $sql = "INSERT INTO `animals`(`animalName`, `animalAge`, `animalType`, `Breed`, `description`, `image`, `hobbies`, `adopted`,`name`, `address`, `zipCode`, `city`) VALUES ('$animalName','$animalAge','$animalType','$Breed','$description','$image','$hobbies','$adopted','$name','$address','$zipCode','$city')";
                // $sql2 = "INSERT INTO `locations`(`locationName`, `address`, `zipCode`, `city`) VALUES ('$locationName','$address','$zipCode','$city')";
                // $sql3 = "INSERT INTO `adoption`(`adoptionDate`) VALUES ('$adoptionDate')";

                if($con->query($sql) === TRUE) {
                    echo "<p class='display-4'>New entry saved!</p>" ;
                    echo "<a href='../../pages/add.php'><button class='btn btn-secondary btn-lg' type='button'>Back</button></a>";
                    echo "<a href='../../pages/admin.php'><button class='btn btn-success btn-lg' type='button'>Home</button></a>";
                } else  {
                    echo "Error " . $sql . ' ' . $con->connect_error;
                }
            
                $con->close();
            }
        ?>
    </div>
</body>

</html>