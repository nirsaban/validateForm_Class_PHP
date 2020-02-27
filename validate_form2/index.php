<?php
$valid;
require('userValid.php');

if(isset($_POST['submit'])){
    $valid = new UserValidator($_POST);
    $errors = $valid->validateForm();
  }
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP VALIDATE FORM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="new-user">
    <h2>Create new user</h2>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
    <label for="">User Name</label>
<input type="text" name="username" <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['username']) ?? ' '; ?>"<?php endif;?>>
   <div class="error"><?= $errors['username'] ?? ''?></div>
    <label for=""> Email</label>
    <input type="text" name="email" <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['email']) ?? ' ' ?>"<?php endif;?>>
    <div class="error"><?= $errors['email'] ?? ''?></div>
    <span><?php if(isset($valid)):?><?= $valid->validateEmail() ?><?php endif ?></span>
    <input type="submit" value="submit" name="submit">
    </form>
    </div>
</body>
</html>