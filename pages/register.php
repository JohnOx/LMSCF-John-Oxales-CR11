<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['customer'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
include_once '../crud/actions/dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 $confpass = trim($_POST['confpass']);
 $confpass = strip_tags($confpass);
 $confpass = htmlspecialchars($confpass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters." ;
 }

 if (empty($confpass)){
    $error = true;
    $confpassError = "Please confirm password.";
   } else if( $confpass != $pass) {
    $error = true;
    $confpassError = "They don't match, hombre!" ;
   }

 // password hashing for security
$password = hash('sha256' , $pass );


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO users(userName,email,password) VALUES('$name','$email','$password')";
  $res = mysqli_query($con, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
   unset($confpass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>



<!DOCTYPE html>
<html>

<head>

    <title>User Registration</title>

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
                    <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Login</a>
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
        <h1>Welcome!</h1>
    </div>
    


<div class ="container">
        <h1 class="text-center">Meet some of our lovely pets who are seeking a shelter! You can discover more when you register!</h1>

        <div class="card-deck">
                <?php
                // Just some teaser to display
                        $sql = "SELECT * FROM animals where animalType = 'small' and adopted = 'no'";
                        $display = mysqli_query($con, $sql);

                        $rows = $display -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rows as $key => $row) {
                             
                            echo   "<div class='col-sm col-md-6 col-lg-3 d-flex align-content-stretch mt-3'>
                                        <div class='card' style='width: 18rem;'>
                                            <img src=".$row['image']." class='card-img-top' style='width: vw; height: 45vh;' >

                                            <div class='card-body'>
                                                <h2>Meet:</h2>
                                                <h3 class='card-title'>".$row['animalName']."</h3>
                                                <p>Give this critter a shelter!</p> 
                                            </div>
                                        </div>
                                    </div>"
                            ;     
                        }
                          
                ?>
        </div>

    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
        <br>
        <br>
        <br>
        <br>
        <br>
        
                    <h2>Please register here if you want to give a pet a new home.</h2>
                    <hr />
                
                    <?php
        if ( isset($errMSG) ) {
        
        ?>
                <div  class="alert alert-<?php echo $errTyp ?>" >
                                <?php echo  $errMSG; ?>
            </div>

        <?php
        }
        ?>
         
    <div class="form-row">
  
        <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>" >
            <span  class = "text-danger" > <?php   echo  $nameError; ?> </span >
        </div>

            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>" >
                <span  class = "text-danger" > <?php   echo  $emailError; ?> </span >
            </div>

            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder = "Enter Password at least 6 characters"   maxlength = "25">
                <span  class = "text-danger" > <?php   echo  $passError; ?> </span >
            </div>

            <div class="form-group col-md-6">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="confpass" placeholder = "Confirm Password"   maxlength = "25">
                <span  class = "text-danger" > <?php   echo  $confpassError; ?> </span >
            </div>
        </div>


        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>

            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Vienna</option>
                    <option>Bangkok</option>
                    <option>Bali</option>
                    <option>New York</option>
                    <option>Rome</option>
                </select>

            </div>

            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>

        </div>
            <div class="form-group">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>

            </div>

                <button type="submit" class="btn btn-primary" name = "btn-signup" >Sign up</button>
    </form>
   
 
</div>


</body >

<hr>
    <footer class="container fluid text-center text-dark">
        <h5>Code Factory - John Oxales 2020</h5>
    </footer> 

</html >
<?php  ob_end_flush(); ?>