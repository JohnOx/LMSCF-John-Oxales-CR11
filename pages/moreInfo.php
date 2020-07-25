<?php
ob_start();
session_start();
require_once '../crud/actions/dbconnect.php';


if(!isset($_SESSION["customer"]) && !isset($_SESSION['admin' ])){
    header("Location: login.php");
    exit;
  }






?>

<!DOCTYPE html>
<html>

<head>

    <title>More Info</title>

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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">

        <a class="navbar-brand text-white" href="home.php">Adopt A Pet</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="small.php">Small Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="big.php">Big Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="seniors.php">Senior Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php?logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a href='admin.php' class='btn btn-primary'>Admin only</a>
                </li>
                
            </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
        </div>
    </nav>

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
        
        <h3>Pet to adopt</h3>
        
           
    <hr>

  
                    <?php

                        if(isset($_GET['animalsID'])){
                            $id= $_GET['animalsID'];
                            $sql = "SELECT * FROM animals WHERE animalsID = ".$id;
                            mysqli_query($con, $sql);
                            
                            
                            }
                        
                        $display = mysqli_query($con, $sql);

                        if($display -> num_rows == 1) {
                            

                            if($display -> num_rows == 1) {
                                $value = $display -> fetch_assoc();
                                 
                                echo   "<div class='card' style='width: 18rem;'>
                                            <img src=".$value['image']." class='card-img-top' >

                                            <div class='card-body'>

                                                <h5 class='card-title'>".$value['animalName']."</h5>
                                                <h6 class='card-subtitle mb-2 text-muted'>Please contact: ".$value['name']."</h6>
                                                <h6 class='card-subtitle mb-2 text-muted'>Address: ".$value['address']."</h6>
                                                <h6 class='card-subtitle mb-2 text-muted'>City: ".$value['City']." Zip:".$value['zipCode']."</h6>
                                                
                                                <a href='adopt.php' class='btn btn-success'>Adopt</a>
                                            </div>
                                        </div>
                                        <a href='home.php' class='btn btn-primary'>Back</a>";

                                       }  
                            }
                    ?>
          
</div>
    </body>
    <hr>
    <br>

    <footer class="container fluid text-center text-dark">
        <h5>Code Factory - John Oxales 2020</h5>
    </footer> 
    
</html>
<?php ob_end_flush(); ?>