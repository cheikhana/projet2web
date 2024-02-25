<?php
        $login="localhost";
        $mdp="";
        $user="root";
            try
            {    $connect= new PDO("mysql:host=$login",$user,$mdp);
              $connect->exec("create database if not exists mabase");
              $nbase="mabase";
                         $connect=new PDO("mysql:host=$login;dbname=$nbase",$user,$mdp);
                $connect->exec("create table if not exists medecins
                          (prenommed varchar(20),
                          nommed varchar(10),
                          telmed int primary key,
                          fonction varchar(10),
                          passmed varchar(10),
                          structure varchar(10),
                          emailmed varchar(15),
                          datemed date) ");  
               /* $connect->exec("create table if not exists disponible(
                           idispo  varchar(10)  primary key,
                           telmed varchar(20) ,
                           begin  int,
                            end int ,
                            constraint fk foreign key(telmed) references medecins(telmed)
                          )");  */
                }
                catch(PDOException $e)
                {
                    echo"ereur".$e->getMessage();
                }   
             $connect=null; 
    ?>
</body>
</html>