<?php
    require_once "../connect.php";
    $check=0;
    if(isset($_POST['sigup'])) {
        $id = "";
        $phonenumber = $_POST['phone'];
        $username = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $role = 'user';
        $sql = "INSERT INTO account (id,user,password,phonenumber,address,role)
        VALUES('$id','$username','$password','$phonenumber','$address','$role');
        ";
        mysqli_query($conn,$sql);
        $check = 1;
    }
?>