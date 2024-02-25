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
         if(!isset($_GET["prenoms"]) || !isset($_GET["noms"]) ||!isset($_GET["tels"]) ||!isset($_GET["mdp"]))
              {
                header("Location:inscription.html");
                exit();
              }
              $prenom=htmlspecialchars($_GET["prenoms"]);
              $nom=htmlspecialchars($_GET["noms"]);
              $telephone=htmlspecialchars($_GET["tels"]);
              $password= md5(htmlspecialchars($_GET["mdp"]));
              $email=htmlspecialchars($_GET["email"]);
              $login="localhost";
              $mdp="";
              $user="root";
              $nbase="mabase";
              $date= new DateTime();
              $daty=$date->format('d:m:y');
              $heure=$date->format('H:i:s');
              $dat=$daty."/".$heure;
              $_SESSION["call"]=$telephone;
              include("creation.php");
              try
              {
                    
                 $connect=new PDO("mysql:host=$login;dbname=$nbase",$user,$mdp);    
              
                 $requete=$connect->prepare("insert into visiteurs(prenomvis,nomvis,telvis,passvis,emailvis,datevis)
                                             values(?,?,?,?,?,?)");
                
                $requete->execute(array($prenom,$nom,$telephone,$password,$email,$dat));

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