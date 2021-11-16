<?php require_once '../backend/init.php'; session_start(); adminSession(); $getIP = new GetUsersIP(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../public/css/style.css">
   <title>ToDoList App</title>
</head>
<body>

   <header>
      <div class="container">
         <nav>
            <h2><?php echo $_SESSION['userName']; ?></h2>
            <a href="../backend/functions/logout.php">LOGOUT</a>
         </nav>
      </div>
   </header>

   <main>
      <div class="container">

         <section class="UsersIP">
            <?php deleteIP(); ?>
            <table>
               <thead>
                  <tr>
                     <td>USERNAME</td>
                     <td>IP</td>
                     <td>DATE LOG</td>
                     <td>ACTION</td>
                  </tr>
               </thead>
               <tbody>
                  <?php $getIP->GetUsersIP(); ?>
               </tbody>
            </table>
         </section>

      </div>
   </main>


</body>
</html>