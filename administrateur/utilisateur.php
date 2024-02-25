<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilisateur</title>
    <link rel="stylesheet" href="../Médecin/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    
        tbody{
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            border: 2px solid #fff;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: rgb(35, 30, 30);
            border: 2px solid #fff; 
        }

        th, td {
            border: 1px solid #fff; 
            padding: 8px;
        }

        th {
            background-color: #e50d0d;
            color: white;
            text-align: left;
        }

        tr:nth-child(odd) {
            background-color: #a65e5e;
        }
    </style>
</head>
<body>
    <section  class="en-tete">
        <nav class="barre-navigation">
            <div class="nav-links " id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul><li><a href="../Accueil/Accueil.html">Accueil</a></li>
                    <li><a href="./utilisateur.html">Tableau de Bord</a></li>
                   <li><a href="Gestion_utilisateur.php">Gestion des Utilisateurs</a></li>
                   <li><a href="./commentaire.html">Gestion des Commentaires et Avis</a></li>
                   <li><a href="./Gestion_contenu.html">Gestion des contenu</a></li>
               </ul> 
            </div>
            <div class="text-box">
                <div>
                    <h1>Liste des Utilisateurs</h1>
                    <table>
                            <thead>
                                <tr>
                                    
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th></th>
                                   
                                    <th>Actions</th> <!-- Ajoutez cette colonne pour les actions -->
                                </tr>
                                
                            </thead>
                            <tbody id="userList">
                                <?php 


                                     $login="localhost";
                                     $base="base";
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
                                        echo '<td>' . $key["prenom"] . '</td>';
                                        echo '<td>' . $key["nom"] . '</td>';
                                        echo '<td>' . $key["email"] . '</td>';
                                       // echo '<td>' . $key["telvisit"] . '</td>';
                                        echo '<td> <form action="#" method="get">
<input type="hidden" name="email" value="' . $key["email"] . '">
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
                                    
                                    <th>Actions</th> <!-- Ajoutez cette colonne pour les actions -->
                                </tr>
                                
                            </thead>
                            <tbody id="userList">
                                <?php 


                                     $login="localhost";
                                     $base="base";
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
                                        echo '<td>' . $key["prenom"] . '</td>';
                                        echo '<td>' . $key["nom"] . '</td>';
                                        echo '<td>' . $key["email"] . '</td>';
                                        //echo '<td>' . $key["telmed"] . '</td>';
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
        </section>
            
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>
    
</body>
</html>
