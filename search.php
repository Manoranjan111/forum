<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

        <style>
            .container{
                min-height: 100vh;
            }
        </style>

    <title>iDescus</title>
</head>

<body>
    <?php 
  include "partials/_header.php";
  include "partials/_dbconnect.php";
  $search=$_GET['search'];
  $sql= "SELECT * FROM threads WHERE MATCH (thread_title,thread_desc) against('$search')";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $title=$row['thread_title'];
    $description=$row['thread_desc'];
    $threadid=$row['thread_id'];
    $url="thread.php?threadlist_id=".$threadid ;
    echo'
      <div class="container">
        <h1 class="text-center h2 my-2 "> Search result for "<em>'.$_GET['search'].'</em>"</h1>
          <div class="card-body py-0">
              <a class="card-title h3 text-dark" href="'.$url.'">'.$title.'</a>
              <p class="card-text my-2">'.$description.'</p>
          </div>
          
      </div>';
  }

?>





    <!-- INCLUDING FOOTER -->
     <?php include "partials/_footer.php";?>
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