<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Gestion_utilisateur.css"> <!-- Assurez-vous d'ajouter votre propre fichier CSS -->
    <link rel="stylesheet" href="../Médecin/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section  class="en-tete">
        <nav class="barre-navigation">
            <div class="nav-links " id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul><li><a href="../Accueil/Accueil.html">Accueil</a></li>
                    <li><a href="./utilisateur.html">Tableau de Bord</a></li>
                   <li><a href="./commentaire.html">Gestion des Commentaires et Avis</a></li>
                   <li><a href="./Gestion_contenu.html">Gestion des contenu</a></li>
               </ul> 
            </div>
            <?php 


$login="localhost";
$base="mabase";
$user="root";
$password="";
    if(isset($_GET['$key["emailvis"]']))
    {
try
{
$connect= new PDO("mysql:host=$login;dbname=$base",$user,$password);
     
$req=$connect->prepare('delete from visiteurs where email=?'); 
$req->execute(array($_GET["name"]));
}
catch(PDOException $e)
{
    echo'erreur'.$e->getMessage();
}
$connect=null;
}
?>
            <div class="text-box">
                <div class="container">
                
                    <div class="user-info">
                        <h2>Liste des Visiteurs</h2>
                        <table id="userTable">
                            <thead>
                                <tr>
                                    
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>telepnone</th>
                                    <th>Actions</th> <!-- Ajoutez cette colonne pour les actions -->
                                </tr>
                                
                            </thead>
                            <tbody id="userList">
                                <?php 


                                     $login="localhost";
                                     $base="mabase";
                                     $user="root";
                                     $password="";
                                try
                                {
                                  $connect= new PDO("mysql:host=$login;dbname=$base",$user,$password);
                                      
                                  $sql=$connect->prepare("select * from visiteurs");
                                  $sql->execute();
                                     
                                      $resultat=$sql->fetchAll();
                                      foreach ($resultat as $key) {
                                        echo '<tr>';
                                        echo '<td>' . $key["prenomvis"] . '</td>';
                                        echo '<td>' . $key["nomvis"] . '</td>';
                                        echo '<td>' . $key["emailvis"] . '</td>';
                                        echo '<td>' . $key["telvis"] . '</td>';
                                        echo '<td> <form action="#" method="get">
<input type="hidden" name="email" value="' . $key["emailvis"] . '">
<button type="submit" name="supprimer">Supprimer</button></form>';    
                                        echo '</tr>';
                                  }
                                        
                                    }
                                    catch(PDOException $e)
                                    {
                                        echo'erreur'.$e->getMessage();
                                    }
                                    

                                ?>
                                <!-- Les données des utilisateurs seront affichées ici -->
                            </tbody>
                        </table>
                    </div>
                    <div class="user-info">
                        <h2>Liste des Medecins</h2>
                        <table id="userTables">
                            <thead>
                                <tr>
                                    
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>telepnone</th>
                                    
                                    <th>Actions</th> <!-- Ajoutez cette colonne pour les actions -->
                                </tr>
                                
                            </thead>
                            <tbody id="userList">
                                <?php 


                                     $login="localhost";
                                     $base="mabase";
                                     $user="root";
                                     $password="";
                                try
                                {
                                  $connect= new PDO("mysql:host=$login;dbname=$base",$user,$password);
                                      
                                  $sql=$connect->prepare("select * from medecins");
                                  $sql->execute();
                                     
                                      $resultat=$sql->fetchAll();
                                      foreach ($resultat as $key) {
                                        echo '<tr>';
                                        echo '<td>' . $key["prenommed"] . '</td>';
                                        echo '<td>' . $key["nommed"] . '</td>';
                                        echo '<td>' . $key["emailmed"] . '</td>';
                                        echo '<td>' . $key["telmed"] . '</td>';
                                        echo '<td> <form action=modifier.php method="get"> <button name="supprimer">supprimer</button></td>';        
                                        echo '</tr>';
                                  }
                                        
                                    }
                                    catch(PDOException $e)
                                    {
                                        echo'erreur'.$e->getMessage();
                                    }
                                    

                                ?>
                                <!-- Les données des utilisateurs seront affichées ici -->
                            </tbody>
                        </table>
                    </div>
                </div>
            
                </div>
        </section>
            
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>
    
</body>
</html>
