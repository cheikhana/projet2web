 <?php
        $login="localhost";
        $mdp="";
        $user="root";
            try
            {    $connect= new PDO("mysql:host=$login",$user,$mdp);
              $connect->exec("create database if not exists mabase");
              $nbase="mabase";
                         $connect=new PDO("mysql:host=$login;dbname=$nbase",$user,$mdp);
                $connect->exec("create table if not exists visiteurs(
                        prenomvis  varchar(20),
                        nomvis varchar(10),
                        telvis int primary key,
                        passvis varchar(10),
                        emailvis varchar(15),
                        datevis date
                )");
                /*$connect->exec("create table if not exists reservation(
                    day  varchar(15),
                    hour varchar(10),
                    telvis int foreign key(telvis) references visiteurs(telvis),
                    sevice varchar(10),
                    datereserve date
                    constraint pk primary key(day,hour);
                    
            )");*/
                }
                catch(PDOException $e)
                {
                    echo"ereur".$e->getMessage();
                }   
             $connect=null; 
    ?>
</body>
</html>