<?php
  session_start();

    require_once 'game-config/config.php';

    // Load all classes
    spl_autoload_register(function ($class_name) {
      include 'wariors-config/'. $class_name . '.config.php';
  });


?>

<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>The Bee Game</title>
   <link rel="stylesheet" href="/css/master.css">
 </head>
 <body>
     <form method="POST" action="index.php">
       <input type="submit" name="post_attack_bee" value="Attack!!!" />
       <input type="submit" name="post_reset_game" value="Reset" />
     </form>
     <br />
     <?php

         // Display of the message if present in the GET
       if(count($_GET)) {
         if(isset($_GET['m'])) echo $_GET['m'];
       }

       // We create the game if it is not already instantiated
       if(!isset($_SESSION['player'])) {
         $_SESSION['player'] = serialize(new Player());
       }

       $player = unserialize($_SESSION['player']);

       // Post management
       if(count($_POST)) {

           if(isset($_POST['post_attack_bee'])) {    // Attack a random bee
               $player->attackBee();
           }

           if(isset($_POST['post_reset_game'])) {    // Reset the game
               session_destroy();
               header('location: index.php?m=You have reset the game.');
               exit;
           }

       }

     // show all the bees
     $tmp = $player->getQueenBee();
     if($tmp !== false) {
         echo '<ul>';
         foreach ($tmp as $key => $value) {
           echo '<li>Queen : '.$value->getLife().'</li>';
         }
         echo '</ul>';
     }

       $tmp = $player->getWorkerBee();
     if($tmp !== false) {
         echo '<ul>';
         foreach ($tmp as $key => $value) {
           echo '<li>Worker : '.$value->getLife().'</li>';
         }
         echo '</ul>';
     }

     $tmp = $player->getDroneBee();
     if($tmp !== false) {
         echo '<ul>';
         foreach ($tmp as $key => $value) {
           echo '<li>Drone : '.$value->getLife().'</li>';
         }
         echo '</ul>';
     }

       // save the game
       $_SESSION['player'] = serialize($player)

     ?>



 </body>
</html>
