<?php
ob_start();
session_start();
require_once '../crud/actions/dbconnect.php';


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

    <title>Admin: add new entries</title>

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

        <a class="navbar-brand text-white" href="#">Adopt A Pet</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="admin.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php?logout">Logout</a>
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


    <div class ="container">

        <h2>Add new entry</h2>

        <form action="../crud/actions/a_add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="animalName">Pet Name</label>
                <input type="text" class="form-control form-control-sm" name="animalName" >
            </div>

            <div class="form-group">
                <label for="animalAge">Pet Age</label>
                <input type="text" class="form-control form-control-sm" name="animalAge" >
            </div>

            <div class="form-group">
                <label for="animalType">Pet Type</label>

                    <select class="custom-select form-control-sm" name="animalType" >
                        <option selected>Size:</option>
                        <option value="1">small</option>
                        <option value="2">big</option>  
                    </select>
            </div>

            <div class="form-group">
                <label for="breed">Breed</label>
                <input type="text" class="form-control form-control-sm" name="breed">
            </div>

            <div class="form-group">
                <label for="description">Describe this pet</label>
                <textarea class="form-control" name="description" id="Textarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="hobbies">Hobbies</label>
                <input type="text" class="form-control form-control-sm" name="hobbies">
            </div>

            <!-- Image upload -->
            <h4>Upload pet image</h4>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile02" accept="text/*">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                </div>
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Upload</button>
                </div>
            </div>
            <hr>
            <h4>Already adopted?</h4>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="adopted" id="exampleRadios1" value="option1">
                    <label class="form-check-label" for="exampleRadios1">
                        Yes
                    </label>
            </div>

            <input class="form-control" type="text" name="adoptionDate" placeholder="Date of adoption YYYY-MM-DD">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="adopted" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        No
                    </label>
            </div>

         <!--    <div class="form-group">
                <label for="adopted">Adopted</label>

                    <select class="custom-select form-control-sm" name="adopted" >
                        <option selected>Availability:</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>  
                    </select>
            </div> -->

            

            <hr>
            <!-- Current owners contact -->
            <h4>Who owns this pet at the moment?</h4>
            
                <div class="form-group col-md-6-lg-12">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Current pet owner's full name">
                </div>

                <div class="form-group col-md-6-lg-12">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-8">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" name="city" id="inputCity">
                </div>

                <!-- <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <input type="text" class="form-control" id="inputState">
                </div> -->
                    
                <div class="form-group col-md-4">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="zipCode" id="inputZip">
                </div>
            


            <input class="btn btn-primary btn-lg" type="submit" role="button" value="Add Pet"></input>
           
            <a class="btn btn-success btn-lg" href="admin.php" role="button">Home</a>
        </form>

        <hr>
        
    </div>

</body>

    <footer class="container fluid text-center text-dark">
        <h5>Code Factory - John Oxales 2020</h5>
    </footer> 
    
</html>
<?php ob_end_flush(); ?>