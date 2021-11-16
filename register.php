<?php require_once './backend/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="public/css/style.css">
   <title>ToDoList App</title>
</head>
<body>

   <main>
      <div class="container">
         <div class="form-container">
            <?php registerUsers(); ?>
            <h3>REGISTER</h3>
            <form method="POST">
               <input name="username" type="text" placeholder="USERNAME" required>
               <input name="password" type="password" placeholder="PASSWORD" required>
               <input name="register" type="submit" value="REGISTER">
               <hr/>
               <p>Already have an account? | <a href="index.php">Login here!</a> </p>
            </form>
         </div>
      </div>
   </main>

</body>
</html>