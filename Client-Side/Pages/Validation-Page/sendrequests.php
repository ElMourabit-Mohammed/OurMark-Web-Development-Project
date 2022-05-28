<?php

$conn = mysqli_connect('localhost','root','','ourmark');

if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $prj_subject = mysqli_real_escape_string($conn, $_POST['prj_subject']);
    $prj_type = mysqli_real_escape_string($conn, $_POST['prj_type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $insert = "INSERT INTO customers_requests (fname ,lname ,phone ,email ,prj_subject ,prj_type ,description) VALUES('$fname','$lname','$phone','$email','$prj_subject','$prj_type','$description')";
    mysqli_query($conn, $insert);
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!---->
    <link rel="stylesheet" href="assets/style.css">
    <!---->
    <title>Send Request</title>
    <!---->
</head>
<body>
    <div class="HEADER">
        <div class="HEADER-CONTENT">
            <img src="assets/images/fingerprint-solid-red.svg">
            <h1>Send Your Request</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, iusto dicta. Nam, odit sed quae iusto fuga dolorem sit omnis molestiae assumenda autem sunt nisi! Veritatis qui aperiam sint asperiores!</p>
        </div>
    </div>
    <div class="REGISTRATION">
        <form action="" method="post">
                <div class="FirstLast">
                    <div class="First">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="fname" required/>
                    </div>
                    <div class="Last">
                        <label for="lastName">Last Name</label>    
                        <input type="text" id="lastName" name="lname" required/>
                    </div>
                </div>
    
                <div class="numero">
                    <label for="tel">Phone Number</label>
                    <input type="tel" id="tel" name="phone" required/>
                </div>
    
                <div class="mail">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required/>
                </div>

                <!-- <label for="SERVICES">Choose a SERVICE:</label>
                <select name="SERVICES">
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Motion Design">Motion Design</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Desktop Development">Desktop Development</option>
                </select> -->

                <div class="subject">
                    <label for="subj">Project subject</label>
                    <input type="text" id="subj" name="prj_subject" required/>
                </div>
    
                <div class="choicebox">
                    <label class="projectrelated" for="POG">A project related to a</label>
                    <label for="PersonalProject" >
                        <input type="radio" name="prj_type" value="Personal Project" id="PersonalProject"/>
                        Personal Project
                    </label>
                    <label for="GroupProject" >
                        <input type="radio" name="prj_type" value="Group Project" id="GroupProject"/>
                        Group Project
                    </label>
                </div>
    
                <div class="contactus">
                    <label for="description">Description of your project</label>
                    <textarea name="description" id="description" rows="10" cols="60"></textarea>
                </div>
                <div class="btn-submit">
                    <button name="submit">Send</button>
                </div>
        </form>
    </div>
</body>
</html>