<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gestion des Reservations </title>
	<link rel="stylesheet" type="text/css" href="styl.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="en-tete">
        <nav>
            <div class="nav-links " id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                
                 <!---- <li><a href="">Connexion</a></li> -->
                    <li><a href="reservation.html">Gestion des Reservations</a></li>
                    <li><a href="disponibilite.html">Gestion des Disponibilités</a></li>
                    <li><a href="notifications.html">Notifications</a></li>
                    <li><a href="statistique.html">Statistiques et Rapports</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>  
		<div class="container">
			<h2>Gestion des reservations </h2>
			<table id="tableau_Reservation">
				<thead>
					<tr>
						<th>Date</th>
						<th>Heure</th>
						<th>Nom du Patient</th>
						<th>Téléphone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 


$login="localhost";
$base="mabase";
$user="root";
$password="";
try
{
$connect= new PDO("mysql:host=$login;dbname=$base",$user,$password);
 
$sql=$connect->prepare("select * from reservations
                       where ");
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
					
					
				</tbody>
			</table>
		</div>
</section>
    
	
	

</body>
</html>