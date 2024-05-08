<?php
    include "connect.php";
    if(isset($_POST['sigup'])) {
        $id = "";
        $phonenumber = $_POST['phone'];
        $username = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $role = 2;
        $sql = "INSERT INTO account (id,user,password,phonenumber,address,role)
        VALUES('$id','$username','$password','$phonenumber','$address','$role');
        ";
        mysqli_query($conn,$sql);
        $check = 1;
    }
?>