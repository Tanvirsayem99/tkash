<?php
include("../home/home.php");
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
<div>
    <h1 class="text-center my-5">Send Money</h1>
    </div>
    <div class="d-flex align-items-center justify-content-center mt-5 ">
    <form action="send_money_post.php" method="POST" class="col-4 border-black">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">recipient number</label>
            <input type="name" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">amount</label>
            <input type="number" class="form-control" name="amount" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">pin</label>
            <input type="text" class="form-control" name="pin" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary my-3" name="send-btn">Send</button>
        </div>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>