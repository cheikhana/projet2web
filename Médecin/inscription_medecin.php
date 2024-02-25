<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document2</title>
</head>
<body>
<?php    
         if(!isset($_GET["prenom"]) || !isset($_GET["nom"]) ||!isset($_GET["tel"]) ||!isset($_GET["pwd1"]) || !isset($_GET["specialite"]))
              {
                header("Location:inscription.html");
                exit();
              }
              $prenom=htmlspecialchars($_GET["prenom"]);
              $nom=htmlspecialchars($_GET["nom"]);
              $telephone=htmlspecialchars($_GET["tel"]);
              $password= md5(htmlspecialchars($_GET["pwd1"]));
              $specialite=htmlspecialchars($_GET["specialite"]);
              $structure=htmlspecialchars($_GET["structure"]);
              $mail=htmlspecialchars($_GET["emails"]);
              $date= new DateTime();
              $dat=$date->format('d:m:y:H:i:s');
              $login="localhost";
              $mdp="";
              $user="root";
              $nbase="mabase";
              include("creation.php");
              try
              {  
                  
                       $connect=new PDO("mysql:host=$login;dbname=$nbase",$user,$mdp);
                    $requete=$connect->prepare("insert into medecins(prenommed,nommed,telmed,fonction,passmed,structure,emailmed,datemed)
                                        values(?,?,?,?,?,?,?,?)");

                    $requete->execute(array($prenom,$nom,$telephone,$specialite,$password,$structure,$mail,$dat));
                    
                header("Location:index.html");
                  exit();
               
              }
  catch (PDOException $e)
  {
    echo('erreur' .$e->getMessage());
  }
  $connect=null;
?>
</body>
</html>