<?php
session_start();
include('../config/db.php');
if(isset($_POST['register-btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pin = $_POST['pin'];
    $encrypted_pin = md5($_POST['pin']);
    if($name && $email && $number && $pin){
        if (preg_match("/^(?:\+88|01)?\d{11}\r?$/", $number)){
            if(is_numeric($pin) == 1){
                if(strlen($pin) >= 5){
                    $email_query = "SELECT COUNT(*) AS result FROM users WHERE email='$email' ";
                    $connect = mysqli_query($db_connect,$email_query);
                    if(mysqli_fetch_assoc($connect)['result'] != 1){
                        $number_query = "SELECT COUNT(*) AS exist_number FROM users WHERE number='$number' ";
                        $connect_number = mysqli_query($db_connect,$number_query);
                        if(mysqli_fetch_assoc($connect_number)['exist_number'] != 1){
                            $insert_query = "INSERT INTO users (name,email,number,pin) VALUES ('$name','$email','$number','$encrypted_pin')";
                            mysqli_query($db_connect,$insert_query);
                            header('location: ../login/login.php');
                        }else{
                            $_SESSION['exist-number-err'] = 'this number already exist';
                            echo 'this number already exist';
                        }
                    } else{
                        $_SESSION['exist-email-err'] = 'this email already exist';
                        echo 'this email already exist';
                    }
                }
                else{
                $_SESSION['pin-letter-err'] = 'please enter at least 5 character pin';
                echo  'please enter at least 5 character pin';
                }
            }
            else{
                $_SESSION['pin-type-err'] = 'pin must be number';
                echo 'pin must be number';
            }
        }
        else{
             $_SESSION['num-err'] = 'enter a valid number, number must be start with +880';
             echo 'enter a valid number, number must be start with +880';
        }
    }else{
        $_SESSION['empty-err'] = 'please fill all input';
    }
    
}
// echo strlen($_POST['number']);
?>