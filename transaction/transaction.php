<?php
include("../home/home.php");
include("../config/db.php");
if(isset($_SESSION['user_number'])){
  $user_number = $_SESSION['user_number'];
  $user_number_query = "SELECT * FROM transactions WHERE sender='$user_number' OR receiver='$user_number'";
  $transaction_history = mysqli_query($db_connect,$user_number_query);
}
if(!isset($_SESSION['user_number'])){
  header("location: ../login/login.php");
}

$serial = 1;
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
        <h1 class="text-center mt-5">transaction history</h1>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">status</th>
      <th scope="col">account</th>
      <th scope="col">amount</th>
      <th scope="col">date/time</th>
      <th scope="col">details</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($transaction_history)) :?>
      <?php foreach($transaction_history as $item) :?>
        <tr>
      <th scope="row"><?=$serial++?></th>
      <td><?php if($user_number == $item['sender']): ?><div>Send money</div><?php endif;?> <?php if($user_number == $item['receiver']): ?><div>received money</div><?php endif;?></td>
      
      <td><?php if($user_number == $item['sender']): ?><div><?=$item['receiver']?></div><?php endif;?> <?php if($user_number == $item['receiver']): ?><div><?=$item['sender']?></div><?php endif;?></td>
      <td><?=$item['amount']?></td>
      <td><?=$item['time']?></td>
      <td><?=$item['details']?></td>
    </tr>
        <?php endforeach;?><?php endif;?>
    
  </tbody>
</table>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>