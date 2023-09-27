<?php
session_start();
$user_id = $_SESSION['user_id'];
include('../config/db.php');
if (isset($_POST['send-btn'])) {
    $recipient_number = $_POST['number'];
    $amount = $_POST['amount'];
    $pin = md5($_POST['pin']);
    $user_number = $_SESSION['user_number'];
    $user_name = $_SESSION['user_name'];
    $select_user = "SELECT * FROM users WHERE id='$user_id'";
    $user_connect = mysqli_query($db_connect, $select_user);
    $user = mysqli_fetch_assoc($user_connect);
    $current_amount = $user['amount'];
    if ($recipient_number && $amount && $pin) {
        $recipient_number_query = "SELECT COUNT(*) AS exist_number FROM users WHERE number='$recipient_number'";
        $connect = mysqli_query($db_connect, $recipient_number_query);
        if (mysqli_fetch_assoc($connect)['exist_number'] == 1) {
            if ($amount <= $_SESSION['user_amount']) {
                $pin_query = "SELECT * FROM users WHERE id='$user_id'";
                $user_connect = mysqli_query($db_connect, $pin_query);
                $user = mysqli_fetch_assoc($user_connect);
                $user_pin = $user['pin'];
                if ($pin === $user_pin) {
                    $details = $user_number . "-" . $user_name . "-" . date("Y-m-d") . "." . $amount;
                    $send_money_query = "INSERT INTO transactions (sender,receiver,amount,details) VALUES ('$user_number','$recipient_number','$amount','$details')";
                    $total_amount = $current_amount - $amount;
                    $exist_money_query = "UPDATE users SET amount='$total_amount' WHERE id='$user_id'";
                    $select_user = "SELECT * FROM users WHERE number='$recipient_number'";
                    $receiver_connect = mysqli_query($db_connect, $select_user);
                    $user = mysqli_fetch_assoc($receiver_connect);
                    $receiver_total_amount = $user['amount'] + $amount;
                    $receiver_exist_money_query = "UPDATE users SET amount='$receiver_total_amount' WHERE number='$recipient_number'";
                    mysqli_query($db_connect, $receiver_exist_money_query);
                    mysqli_query($db_connect, $exist_money_query);
                    mysqli_query($db_connect, $send_money_query);
                    $_SESSION['user_amount'] = $total_amount;
                } else {
                    $_SESSION['pin-match-err'] = 'pin cannot match';
                    echo 'pin cannot match' . '</br>';
                    echo $pin . '</br>';
                    echo $user['pin'];
                }
            } else {
                $_SESSION['amount-err'] = 'please add money first';
                echo 'please add money first';
            }
        } else {
            $_SESSION['exist_recipient_err'] = 'please enter a existing number';
            echo 'please enter a existing number';
        }
    } else {
        $_SESSION['send_money_exist_err'] = "please fill up all input";
        echo "please fill up all input";
    }
}
