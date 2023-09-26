<?php
session_start();
if(isset($_POST['register-btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pin = $_POST['pin'];
    if($name && $email && $number && $pin){
        if (preg_match("/^(?:\+88|01)?\d{11}\r?$/", $number)){
            if(is_numeric($pin) == 1){
                if(strlen($pin) >= 5){
                    
                }
                else{
                $_SESSION['pin-letter-err'] = 'please enter at least 5 character pin';
                }
            }
            else{
                $_SESSION['pin-type-err'] = 'pin must be number';
            }
        }
        else{
             $_SESSION['num-err'] = 'enter a valid number, number must be start with +880';
        }
    }
    
}
echo strlen($_POST['number']);
?>