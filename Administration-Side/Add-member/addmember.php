<?php

@include '../config/config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $member_type = $_POST['member_type'];

   $select = " SELECT * FROM members_accounts WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Email already exist !';

   }else{

      if($pass != $cpass){
         $error[] = 'Password not matched !';
      }else{
         $insert = "INSERT INTO members_accounts(name, email, password, member_type) VALUES('$name','$email','$pass','$member_type')";
         mysqli_query($conn, $insert);
         header('location:../projectmanager/projectmanager.php');
      }
   }

};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD MEMBER</title>
    <link rel="shortcut icon" href="../../Client-Side/Assets-Global/LOGO/icon/fingerprint-solid-red.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./addmember/addmember.css">
</head>
<body>
    <form action="" method="post">
        <div class="form_content">
            <h3>ADD MEMBER</h3>
            <label for="name">Name</label>
            <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
            <label for="email">Email</label>
            <input type="email" placeholder="Email" id="email" name="email" class="form-control" required>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" class="form-control" required>
            <label for="cpassword">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" class="form-control" required>
            <label for="member_type">Profil</label>
            <select name="member_type" class="member_type">
                <option value="Web Developer">Web Developer</option>
                <option value="Graphic Designer">Graphic Designer</option>
                <option value="Content Writer">Content Writer</option>
                <option value="SEO/SEM Manager">SEO/SEM Manager</option>
                <option value="Expert Marketing Digital">Expert Marketing Digital</option>
             </select>
            <button name="submit">ADD</button>
            <div class="error">
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                ?>
            </div>
        </div>
    </form>
</body>
</html>
