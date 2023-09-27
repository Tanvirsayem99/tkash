<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tkash</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark-subtle">
    <div class="d-flex align-items-center justify-content-center mt-5">
    <div  class="border w-50 bg-white">
    <div>
    <h1 class="text-center my-5">registration</h1>
    </div>
    <div class="d-flex align-items-center justify-content-center mt-5 w-full ">
    <form action="../register/register_post.php" method="POST" class="col-4 border-black w-75">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Number</label>
            <input type="text" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Set Pin code</label>
            <input type="password" class="form-control" name="pin" id="exampleInputPassword1">
        </div>
        <div>
            <p>Already have a account? please <a href="../login/login.php">login</a></p>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary my-3" name="register-btn">register</button>
        </div>
        
    </form>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>