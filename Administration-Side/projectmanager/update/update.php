<?php
    @include '../../config/config.php';

    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];
        $select = " SELECT * FROM members_accounts WHERE id='$id' ";
        $res=mysqli_query($conn,$select);
        if($res){
            $row=mysqli_fetch_assoc($res);;
            $nom=$row['name'];
            $profile=$row['member_type'];
            $email=$row['email'];
        }
        else{
            die(mysqli_error($conn));
        }
    }


    if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $member_type = $_POST['member_type'];

    $select = " SELECT * FROM members_accounts WHERE email = '$email' and id != '$id' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'Member already exist !';

    }else{

        if($pass != $cpass){
            $error[] = 'Password not matched !';
        }else{
            if(!empty($name) && !empty($email) && !empty($pass) && !empty($member_type)){
                $insert = "update members_accounts SET name='$name',email='$email',password='$pass',member_type='$member_type' WHERE id='$id'";
                mysqli_query($conn, $insert);
                header('location:../projectmanager.php');
            }
            if(!empty($name) && !empty($email) && !empty($member_type)){
                $insert = "update members_accounts SET name='$name',email='$email',member_type='$member_type' WHERE id='$id'";
                mysqli_query($conn, $insert);
                header('location:../projectmanager.php');
            }
            if(!empty($name) && !empty($member_type)){
                $insert = "update members_accounts SET name='$name',member_type='$member_type' WHERE id='$id'";
                mysqli_query($conn, $insert);
                header('location:../projectmanager.php');
            }
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
    <title>Document</title>
    <link rel="shortcut icon" href="../../../Client-Side/Assets-Global/LOGO/icon/fingerprint-solid-red.svg" />
    <link rel="stylesheet" href="./updatecss/update.css">

</head>
<body>
    <div class="container">
        <div class="containercontent">
        <div class="oldinfo">
            <div class="oldinfocontent">
                <h3>Name : <?php echo "$nom";?></h3>
                <h3>Email : <?php echo "$email";?></h3>
                <h3>Profile : <?php echo "$profile";?></h3>
            </div>
        </div>
        <div class="newinfo">
            <form action="" method="post">
                <div class="newinformation">
                    <label for="name">New Name</label>
                    <input type="text" placeholder="Name" id="name" name="name" class="form-control">
                </div>
                <div class="newinformation">
                    <label for="email">New Email</label>
                    <input type="email" placeholder="Email" id="email" name="email" class="form-control">   
                </div>
                <div class="newinformation">
                    <label for="password">New Password</label>
                    <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                </div>
                <div class="newinformation">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" class="form-control"> 
                </div>
                <div class="newinformation">
                    <label for="member_type">New Profil</label>
                    <select name="member_type" class="member_type">
                        <option value="Web Developer">Web Developer</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                        <option value="Content Writer">Content Writer</option>
                        <option value="SEO/SEM Manager">SEO/SEM Manager</option>
                        <option value="Expert Marketing Digital">Expert Marketing Digital</option>
                    </select>
                </div>
                
                <button name="submit">Update</button>
            </form>
        </div>
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

    </div>
</body>
</html>