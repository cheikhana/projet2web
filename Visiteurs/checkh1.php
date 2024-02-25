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
if(!isset($_GET["mot"]) || !isset($_GET["emails"]))
{
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
                        from visiteurs
                        where password=?
                        and email=?";
                  $requete1=$connect->prepare($sql);        
                  $requete1->execute(array($pass,$email));       
                   if($requete1->rowcount()>0)
                {
                  header("Location:visiteur.html");
                }
                else
                {
                  echo'mot de passe ou email incorrect';
                  header("Location:connexion.html");
                }  
           }
  catch (PDOException $e)
  {
    echo('erreur' .$e->getMessage());

  }
  session_destroy();
  ?>
</body>
</html>