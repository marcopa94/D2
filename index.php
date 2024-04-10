<?php


echo '<pre>' . print_r($_POST, true) . '</pre>'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nome'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }

    if (strlen($password) < 5) {
        $errors['password'] = 'Password invalid';
    }
    if ($age < 18) {
        $errors['password'] = 'Age must low';
    }
    if ($errors == []) {
        header('Location: /w1/D2/elaborazione.php');
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style> #box{display: flex; justify-content: center; margin-top: 100px; border: 1px solid grey; border-radius: 10px; padding: 10px;}
body{background-color: bisque;}
form{background-color: bisque;}
</style>
</head>
<body>
    <div  id="box">
<form style="width: 500px;" action="" method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control"  name="nome" id="name" >
   
  </div>
  <div class="mb-3">
    <label for="surname" class="form-label">surname</label>
    <input type="text" class="form-control"  name="surname" id="surname" >
   
  </div>
  <div class="mb-3">
    <label for="Age" class="form-label">Age</label>
    <input type="text" class="form-control"  name="age" id="age" >
    <div class="error"><?= $errors['password'] ?? '' ?></div>
   
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control"  name="email" id="email" >
    <div class="error"><?= $errors['email'] ?? '' ?></div>
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" id="exampleInputPassword1"  ">

</div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>