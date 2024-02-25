<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if(!isset($_GET["mot"]) || !isset($_GET["emails"]))
{
    echo'Veuillez remplir tous les champs ';
  header("Location:connexion.html");
}
      $login="localhost";
      $mdp="";
      $user="root";
      $nbase="base";
      $email=htmlspecialchars($_GET["emails"]);
      $pass=md5(htmlspecialchars($_GET["mot"])); 

      try
              {
               $connect=new PDO("mysql:host=$login;dbname=$nbase",$user,$mdp);
              $sql="select *
                  from medecins
                 where password=?
                  and email=?";

                 $requete1=$connect->prepare($sql);
                
                $requete1->execute(array($pass,$email));
                
                if($requete1->rowcount() > 0)
               
                {
                  header("Location:index.html");
                }
                  header("Location:connexion.html"); 
                $connect=null;
              }
  catch (PDOException $e)
  {
    echo('erreur' .$e->getMessage());

  }
  ?>
</body>
</html>