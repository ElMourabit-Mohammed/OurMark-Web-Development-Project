<?php

@include '../config/config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);


   $select = " SELECT * FROM members_accounts WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      
      if($row['member_type'] == 'Projects Manager'){
         $_SESSION['member_name'] = $row['name'];
         header('location:../projectmanager/projectmanager.php');
      }
      else{
         $_SESSION['member_name'] = $row['name'];
         header('location:../memberpage/memberpage.php');
      }
     
    }
   else{
      $error[] = 'Incorrect email or password !';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./LOGINcss/login.css">
    <link rel="shortcut icon" href="../../Client-Side/Assets-Global/LOGO/icon/fingerprint-solid-red.svg" />
</head>
<body>
    <!-- <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
    <form action="" method="post">
        <h3>Login</h3>

        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email" class="form-control">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" class="form-control">

        <button name="submit">Log In</button>
        <div class="error">
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                ?>
            </div>
    </form>
</body>
</html>