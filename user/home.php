<?php require_once '../backend/init.php'; session_start(); commonSession(); usersIP(); $getList = new GetList($_SESSION['userID']); ?>
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
            <div class="nav-links">
            <?php deleteAccount(); ?>
               <form method="POST">
                  <input name="deleteAccount" type="submit" value="Delete Account">
               </form>
               <a href="../backend/functions/logout.php">LOGOUT</a>
            </div>
         </nav>
      </div>
   </header>

   <main>
      <div class="container">

         <section class="listSection">
            <?php insertList(); ?>
            <form method="POST">
               <input name="list" type="text" placeholder="ADD LIST !">
               <input name="addList" type="submit" value="ADD LIST">
            </form>
         </section>

         <section class="addedList">
            <?php confirmPending(); deletePending(); ?>
            <table>
               <thead>
                  <tr>
                     <td>LIST</td>
                     <td>STATUS</td>
                     <td>ACTION</td>
                  </tr>
               </thead>
               <tbody>
                  <?php $getList->getPendingList(); deleteCompleted(); ?>
               </tbody>
            </table>
         </section>
         <br/>
         <section class="addedList">
            <table>
               <thead>
                  <tr>
                     <td>LIST</td>
                     <td>STATUS</td>
                     <td>ACTION</td>
                  </tr>
               </thead>
               <tbody>
                  <?php $getList->getCompletedList(); ?>
               </tbody>
            </table>
         </section>

      </div>
   </main>


</body>
</html>