<?php
    @include '../../config/config.php';

    if(isset($_POST['addeventbtn'])){
        $newevent =$_POST['newevent'];
        $neweventdate =$_POST['neweventdate'];
        $insertevent = "INSERT INTO events_date (event, event_date) VALUES('$newevent','$neweventdate')";
        mysqli_query($conn, $insertevent);
        header('location:../projectmanager.php');
    };
?>