<?php
$insert=false;
$error=false;
include"partials/_header.php";
include"partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $contactemail = $_POST['contactemail'];
  $contactphone = $_POST['contactphone'];
  $contactconcern = $_POST['contactconcern'];

     $sql = "INSERT INTO `contact` (`contact_email`, `contact_phone`, `contact_description`, `contact_time`) VALUES ('$contactemail', '$contactphone', '$contactconcern', current_timestamp())";
    $result = mysqli_query($conn, $sql);
   
    if($result){
        $insert=true;
    }else{
        $error=true;
    }

        
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contact</title>
</head>

<body>
    <?php
if($insert){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> Your Concern send successfully we will reply soon.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> Some Error Try again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
?>

    <div class="container">
        <h1>Contact Form </h1>
        <form action ="/forum/contact.php" method="POST" >
            <div class="mb-3">
                <label for="contactemail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="contactemail" name="contactemail"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="contactphone" class="form-label">Phone Number</label>
                <input class="form-control" id="contactphone" name="contactphone">
            </div>
            <div class="form-group mb-3">
                <label for="contactconcern">concern</label>
                <textarea class="form-control" id="contactconcern" name="contactconcern" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>