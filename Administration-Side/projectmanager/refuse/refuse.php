<?php
    @include '../../config/config.php';

    if(isset($_GET['refuseid'])){
        $id=$_GET['refuseid'];

        $sql="delete from customers_requests where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
            header('location:../projectmanager.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }



?>