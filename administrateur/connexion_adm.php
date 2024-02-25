<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

            $login= htmlspecialchars($_GET["login"]);
            $pass=htmlspecialchars($_GET["pass"]);
            if(!isset($login) || !isset($pass) || $login!="ADMIN" ||$pass!="DEVWEB")
            {
                header("Location:admin_connection.html");
                exit();
            }    
               elseif ($login==="ADMIN" && $pass==="DEVWEB")
                {
                    header("Location:Adm_accueil.html");
                    exit();
                }
     ?>
</body>
</html>