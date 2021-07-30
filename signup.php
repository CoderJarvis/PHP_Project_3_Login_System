<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign up</title>
</head>

<body>


    <?php
        include '_navbar.php';
   ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        include '_db.php';


        $username=$_POST['username'];
        $password=$_POST['password'];
        $vpassword=$_POST['vpassword'];

        $successAlert=false;
        $PasswordErrorAlert=false;
        $usernameUniqueError=false;

        $sql="SELECT * FROM `user` WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if ($num!=0) 
        {
          $usernameUniqueError=true;
        }

        else 
        {
              if ($password == $vpassword && ($username && $password && $vpassword != NULL) ) 
              {
                  $sql="INSERT INTO `user` (`username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp());";
                  $result=mysqli_query($conn,$sql);
                    if ($result)
                    {
                            $successAlert=true;
                    }
                        
              }
              else 
              {
                $PasswordErrorAlert=true;
              }
          
        }

        
        
        if ($successAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> your account succesfully created and you can now log in
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            
        }
        if ($PasswordErrorAlert) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Sorry, Password not matched. Please try again
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if ($usernameUniqueError) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> username alreay exists please choose another username
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        
    }

    ?>






    <div class="container">

        <form action="signup.php" method="POST">
            <div class="mb-3 my-4">
                <label for="exampleInputEmail1" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Varify Password</label>
                <input type="password" class="form-control" id="vpassword" name="vpassword">
                <div id="emailHelp" class="form-text">enter your password again to varify</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>