<?php
ob_start();
session_start();
require_once '../crud/actions/dbconnect.php';


if(!isset($_SESSION["customer"])){
    header("Location: login.php");
    exit;
  }
// select logged-in users details
$res=mysqli_query($con, "SELECT * FROM users WHERE userID=".$_SESSION['customer']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * FROM animals where animalAge >= 8 order by animalAge asc";


?>

<!DOCTYPE html>
<html>

<head>

    <title>Adopt a pet</title>

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
                    <a class="nav-link text-white" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="small.php">Small Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="big.php">Big Pets</a>
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

<div class="container">
        <h1>Welcome, <?php echo $userRow['userName' ]; ?>!</h1>
        <h3>They are old but still gold!</h3>
        
           
    <hr>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col" class='text-center'>Name</th>
            <th scope="col" class='text-center'>Age</th>
            <th scope="col" class='text-center'>Breed</th>
            <th scope="col" class='text-center'>Type</th>
            <th scope="col" class='text-center'>Hobbies</th>
            <th scope="col" class='text-center'>Show Picture & Details</th>
            <th scope="col" class='text-center'>Give it a home</th>
        </thead>

        <tbody>
                    <?php
                        
                        $display = mysqli_query($con, $sql);

                        if($display -> num_rows == 0) {
                            echo "Nothing to display!";
                        } 
                            elseif($display -> num_rows == 1) {
                                $row = $display -> fetch_assoc();
                                echo "<tr>  <td class='text-center'>".$row['animalName']."</td>
                                            <td class='text-center'>".$row['animalAge']."</td>
                                            <td class='text-center'>".$row['Breed']."</td>
                                            <td class='text-center'>".$row['animalType']."</td>
                                            <td class='text-center'>".$row['hobbies']."</td>
                                            <td class='text-center'> <a href='moreInfo.php?animalsID=" .$row['animalsID']."'><button class='btn btn-info' type='button'>More Info</button></a></td>
                                                <td class='text-center'> <a href='./crud/adopt.php?id=" .$row['animalsID']."'><button class='btn btn-success' type='button'>Adopt</button></a>
                                                        
                                                </td>
                                        </tr>";
                            }
                                else {
                                    $rows = $display -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rows as $key => $value) {
                                        echo "<tr>      <td class='text-center'>".$value['animalName']."</td>
                                                        <td class='text-center'>".$value['animalAge']."</td>
                                                        <td class='text-center'>".$value['Breed']."</td>
                                                        <td class='text-center'>".$value['animalType']."</td>
                                                        <td class='text-center'>".$value['hobbies']."</td>
                                                        <td class='text-center'> <a href='moreInfo.php?animalsID=" .$value['all_isbn']."'><button class='btn btn-info' type='button'>More Info</button></a></td>
                                            <td class='text-center'> <a href='./crud/adopt.php?animalsID=" .$value['animalsID']."'><button class='btn btn-success' type='button'>Adopt</button></a>
                                                    
                                            </td>
                                                </tr>";
                                    }
                            }
                    ?>
            </tbody>

            
    </table>
</div>



    </body>

    <footer class="container fluid text-center text-dark">
        <h5>Code Factory - John Oxales 2020</h5>
    </footer> 
    
</html>
<?php ob_end_flush(); ?>