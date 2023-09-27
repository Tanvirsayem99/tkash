<?php
session_start();
include('../config/db.php');
$exist_amount = $_SESSION['user_amount'];
$user_id = $_SESSION['user_id'];
if(isset($_POST['add-btn'])){
    $amount = $_POST['amount'];
    $pin = md5($_POST['pin']);
    $user_number = $_SESSION['user_number'];
    if( $amount && $pin){
        $user_number_query = "SELECT COUNT(*) AS exist_number FROM users WHERE number='$user_number'";
        $connect = mysqli_query($db_connect,$user_number_query);
        if(mysqli_fetch_assoc($connect)['exist_number'] == 1){
                $pin_query = "SELECT * FROM users WHERE id='$user_id'";
                $user_connect = mysqli_query($db_connect,$pin_query);
                $user = mysqli_fetch_assoc($user_connect);
                $user_pin = $user['pin'];
                if($pin === $user_pin){
                    $total_amount = $exist_amount + $amount;
                    $add_money_query = "UPDATE users SET amount='$total_amount' WHERE id='$user_id'";
                    mysqli_query($db_connect,$add_money_query);
                    $_SESSION['user_amount'] = $total_amount;
                    header("location: ../addmoney/add_money.php");
                }else{
                    $_SESSION['pin-match-err'] = 'pin cannot match';
                    header("location: ../addmoney/add_money.php");
                }
        }else{
            $_SESSION['exist_recipient_err'] = 'please enter a existing number';
            header("location: ../addmoney/add_money.php");
        }
    }
    else{
        $_SESSION['send_money_exist_err'] = "please fill up all input";
        header("location: ../addmoney/add_money.php");
    }
}

?>