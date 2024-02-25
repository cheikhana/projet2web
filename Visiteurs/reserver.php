<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php
         session_start();
             $login="localhost";
             $mdp="";
             $user="root";
             $nbase="mabase";
             $date= new DateTime();
             $daty=$date->format('d:m:y');
             $heure=$date->format('H:i:s');
             $dat=$daty."/".$heure;
             $jour=htmlspecialchars($_GET["jour"]);
             $heure=htmlspecialchars($_GET["time"]);
             $service=htmlspecialchars($_GET["service"]);
             $tel=$_SESSION["call"];
             try
             {
                   
                $connect=new PDO("mysql:host=$login;dbname=$nbase",$user,$mdp);    
             
                $requete=$connect->prepare("insert into reservation(day,hour,service,telvis,datereserve)
                                            values(?,?,?,?,?)");
               
               $requete->execute(array($jour,$heure,$service,$tel,$dat));

               header("Location:visiteur.html");
               exit();
                  
             }
 catch (PDOException $e)
 {
   echo('erreur' .$e->getMessage());
 }

$connect=null;
session_destroy();
    ?>
 </body>
</html>