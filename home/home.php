<?php
session_start();
include('../config/db.php');
$current_amount = $_SESSION['user_number'];
$select_user = "SELECT * FROM users WHERE number='$current_amount'";
$receiver_connect = mysqli_query($db_connect, $select_user);
$user = mysqli_fetch_assoc($receiver_connect);
$_SESSION['user_amount'] = $user['amount'];
// echo $_SESSION['user_id'];
// echo $_SESSION['user_name'];
// echo $_SESSION['user_number'];
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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="../send_money/send_money.php">send-money</a>
                    <a class="nav-link" href="../addmoney/add_money.php">Add-money</a>
                    <a class="nav-link" href="../transaction/transaction.php">history</a>
                </div>
                <div class="d-flex gap-3">
                    <div class="">
                        <? if ($_SESSION['user_amount']) : ?>
                            <?= $_SESSION['user_amount'] ?>
                        <? endif;
                        unset($_SESSION['user_amount']) ?>
                    </div>
                    <div class="">
                        <? if ($_SESSION['user_number']) : ?>
                            <?= $_SESSION['user_number'] ?>
                        <? endif;
                        unset($_SESSION['user_number']) ?>
                    </div>
                    <div class="">
                        <? if ($_SESSION['user_name']) : ?>
                            <?= $_SESSION['user_name'] ?>
                        <? endif;
                        unset($_SESSION['user_name']) ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>