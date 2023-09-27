<?php
include('../config/db.php');


session_start();

if(isset($_POST['login-btn'])){
    $number = $_POST['number'];
    $pin = md5($_POST['pin']);
    
    if($number && $pin){
        $select_query = "SELECT COUNT(*) AS result FROM users WHERE number='$number' AND pin='$pin' ";
    
        $connect = mysqli_query($db_connect,$select_query);
    
        if(mysqli_fetch_assoc($connect)['result'] == 1){
            $select_user = "SELECT * FROM users WHERE number='$number'";
            $user_connect = mysqli_query($db_connect,$select_user);
    
           $user = mysqli_fetch_assoc($user_connect);
           $_SESSION['user_id'] = $user['id'];
           $_SESSION['user_name'] = $user['name'];
           $_SESSION['user_number'] = $user['number'];
           $_SESSION['user_amount'] = $user['amount'];
            
            header("location: ../home/home.php");
        }else{
            $_SESSION['login_error']="users information can't register";
            header("location: login.php");
        }
    
    }
    else{
        echo "kisui nai";
    }
}



?>