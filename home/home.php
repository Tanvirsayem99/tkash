<?php
session_start();
include('../config/db.php');
if(isset($_SESSION['user_number'])){
    $current_amount = $_SESSION['user_number'];
    $select_user = "SELECT * FROM users WHERE number='$current_amount'";
    $receiver_connect = mysqli_query($db_connect, $select_user);
    $user = mysqli_fetch_assoc($receiver_connect);
    $_SESSION['user_amount'] = $user['amount'];
}

if(!isset($_SESSION['user_number'])){
    header("location: ../login/login.php");
}


$server = $_SERVER['PHP_SELF'];
$expolde = explode('/', $server);


$link = end($expolde);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tkash</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tkash</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../home/home.php">Home</a>
                    <a class="<?= ($link == 'send_money.php') ? 'text-primary' : '' ?> nav-link" href="../send_money/send_money.php">send-money</a>
                    <a class="<?= ($link == 'add_money.php') ? 'text-primary' : '' ?> nav-link" href="../addmoney/add_money.php">Add-money</a>
                    <a class="<?= ($link == 'transaction.php') ? 'text-primary' : '' ?> nav-link" href="../transaction/transaction.php">history</a>

                    
                    <a class="nav-link" href="../login/login.php">login</a>
                    <?php if((isset($_SESSION['user_number']))) : ?>
                        <a class="nav-link" href="../logout/logout.php">LogOut</a>
                    <?php endif;?>
                </div>
                <div class="bg-success-subtle rounded-5 p-2">
                        Balance:
                        <? if (isset($_SESSION['user_amount'])) : ?>
                            <?= isset($_SESSION['user_amount']) ? $_SESSION['user_amount'] : '' ?>
                        <? endif;
                        unset($_SESSION['user_amount']) ?>
                    </div>
                <div class="d-flex gap-3">
                    <div class="">
                        number:
                        <? if (isset($_SESSION['user_number'])) : ?>
                            
                            <?= isset($_SESSION['user_number']) ? $_SESSION['user_number'] : ''?>
                        <? endif;
                        unset($_SESSION['user_number']) ?>
                    </div>
                    <div class="">
                        email:
                        <? if (isset($_SESSION['user_name']))    : ?>
                            <?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '' ?>
                        <? endif;
                        unset($_SESSION['user_name']) ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-5"><?= ($link == 'home.php') ? 'Hello welcome' : '' ?></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>