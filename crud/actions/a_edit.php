<!DOCTYPE html>
<html>

<head>

    <title>Updates saved</title>

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
                $city= $_POST['City'];
                
                // $adoptionDate = $_POST['adoptionDate'];

                $id = $_POST['animalsID'];
                
                // $sql = "UPDATE animals SET animalName = '$animalName' WHERE animalsID = ".$id;

            $sql = "UPDATE animals SET animalName='$animalName', animalAge ='$animalAge', animalType ='$animalType', Breed ='$Breed', `description` ='$description', hobbies = '$hobbies', adopted='$adopted', `name`='$name', `address` = '$address', zipCode = '$zipCode', City = '$city' WHERE animalsID = '{$id}'";
                /* $sql2 = "UPDATE `locations` SET `locationName` = '$locationName', `address` = '$address', `zipCode` = '$zipCode', `city`= '$city'";
                $sql3 = "UPDATE `adoption` SET `adoptionDate`='$adoptionDate'"; */

                if($con->query($sql) === TRUE) {
                    echo "<p class='display-4'>Updates saved!</p>" ;
/*                     echo "<a href='/pages/add.php'><button class='btn btn-secondary btn-lg' type='button'>Back</button></a>";
                    echo "<a href='/pages/admin.php.php'><button class='btn btn-success btn-lg' type='button'>Home</button></a>";
 */                } else  {
                    echo "Error " . $sql . ' ' . $con->connect_error;
                }
            
                $con->close();
            }
        ?>
    </div>

    <script>
        setTimeout(function () {
        window.location.href= '../../pages/admin.php'; // the redirect goes here

        },1000);
    </script>
</body>

</html>